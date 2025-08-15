#include <WiFi.h>
#include <HTTPClient.h>
#include "esp_timer.h"
#include <Preferences.h>

#include <ArduinoJson.h>

StaticJsonDocument<200> doc;
unsigned long lastPollTime = 0;
const unsigned long pollInterval = 500;
// #define SA12_PIN     15
// #define 2      2
// #define SA220V_PIN   4
// #define PUMP_PIN     17
#define BAT_PIN 36  // VP
#define solar_battery_EXIT 39  // VN
#define electricalValue_EXIT 34  //  ELECTEICAL EXIT


volatile char room[10] = "";
volatile char newResponse[10] = "";

// sw 13 12 14 27 exlary 26
const int inputPins[] = { 13, 12, 14, 27, 26, 5, 18, 19, 21, 25, 33, 32, 35 };
// 15 out s A 12v
// 2 out s A 5v
// 4 out s A 220v
// 16 led connectes gren
const char* pinLabels[] = { "SW1", "SW2", "SW3", "SW4", "SW5", "IR1", "IR2", "IR3", "IR4", "fire1", "fire2", "fire3", "fire4" };
const int outputPins[] = { 17, 4, 15, 2, 22, 16 };
const char* ssid = "Y1";
const char* password = "yousef7753811";
volatile bool is_on = true;
volatile bool is_alart = false;
volatile bool solar_battery = true;
volatile bool SWITCH_senser = true;
volatile bool IR_senser = true;
volatile bool fire_senser = true;
volatile bool sound_alart = true;
bool alart_sound_220v = true; // تأكد أنك عرّفته بشكل عام في الأعلى

volatile bool pumm_alart = true;
volatile bool start = true;
volatile int count = 0;
volatile int sw[5] = { 0, 0, 0, 0, 0 };
volatile int ir[4] = { 0, 0, 0, 0 };
volatile int fire[4] = { 0, 0, 0, 0 };
int batteryValue = 50;
int electricalValue = 1;
bool is_alrat_on = false;

unsigned long startTime = 0;
Preferences prefs;

void loadSettings() {
  prefs.begin("sensors", true);
  is_on             = prefs.getBool("is_on", false);
  SWITCH_senser     = prefs.getBool("switch", false);
  IR_senser         = prefs.getBool("ir", false);
  fire_senser       = prefs.getBool("fire", false);
  sound_alart       = prefs.getBool("sound", false);
  pumm_alart        = prefs.getBool("pumm", false);
  alart_sound_220v  = prefs.getBool("sound220v", false);
  prefs.end();
}

void saveSettingsIfChanged(bool new_is_on, bool new_switch, bool new_ir, bool new_fire, bool new_sound, bool new_pumm, bool new_220v) {
  bool changed = false;
  prefs.begin("sensors", false);

  if (prefs.getBool("is_on", false) != new_is_on) {
    prefs.putBool("is_on", new_is_on);
    changed = true;
  }
  if (prefs.getBool("switch", false) != new_switch) {
    prefs.putBool("switch", new_switch);
    changed = true;
  }
  if (prefs.getBool("ir", false) != new_ir) {
    prefs.putBool("ir", new_ir);
    changed = true;
  }
  if (prefs.getBool("fire", false) != new_fire) {
    prefs.putBool("fire", new_fire);
    changed = true;
  }
  if (prefs.getBool("sound", false) != new_sound) {
    prefs.putBool("sound", new_sound);
    changed = true;
  }
  if (prefs.getBool("pumm", false) != new_pumm) {
    prefs.putBool("pumm", new_pumm);
    changed = true;
  }
  if (prefs.getBool("sound220v", false) != new_220v) {
    prefs.putBool("sound220v", new_220v);
    changed = true;
  }

  if (changed) {
    Serial.println("📝 تم التخزين: حدث تغيير في القيم.");
  } else {
    Serial.println("✅ لا يوجد تغيير، لم يتم الحفظ.");
  }

  prefs.end();
}

bool processResponse(const String& response) {
  StaticJsonDocument<200> doc;
  DeserializationError error = deserializeJson(doc, response);
  if (error) {
    Serial.print("JSON parse failed: ");
    Serial.println(error.c_str());
    return false;
  }

  // تحقق من وجود كل المفاتيح المطلوبة
  if (!doc.containsKey("button_state") || !doc.containsKey("SWITCH_senser") || 
      !doc.containsKey("IR_senser") || !doc.containsKey("fire_senser") || 
      !doc.containsKey("alart_sound") || !doc.containsKey("send_pumm") ||
      !doc.containsKey("alart_sound_220v")) {
    Serial.println("JSON missing keys!");
    digitalWrite(16, 1);  // FALID
    digitalWrite(22, 0);
    return false;
  }

  // // استخراج القيم وتحويلها
  // is_on = doc["button_state"] == 1;
  // SWITCH_senser = doc["SWITCH_senser"] == 1;
  // IR_senser = doc["IR_senser"] == 1;
  // fire_senser = doc["fire_senser"] == 1;
  // sound_alart = doc["alart_sound"] == 1;
  // pumm_alart = doc["send_pumm"] == 1;
  // alart_sound_220v = doc["alart_sound_220v"] == 1; // ✅ تمت الإضافة

  // Serial.println("تمت المعالجة بنجاح من JSON");
    // استخراج القيم من JSON الحقيقي
  bool new_is_on          = doc["button_state"] == 1;
  bool new_switch         = doc["SWITCH_senser"] == 1;
  bool new_ir             = doc["IR_senser"] == 1;
  bool new_fire           = doc["fire_senser"] == 1;
  bool new_sound          = doc["alart_sound"] == 1;
  bool new_pumm           = doc["send_pumm"] == 1;
  bool new_220v           = doc["alart_sound_220v"] == 1;

  // التحقق والحفظ إذا تغيّرت القيم
  saveSettingsIfChanged(new_is_on, new_switch, new_ir, new_fire, new_sound, new_pumm, new_220v);

  digitalWrite(16, 0);  // FALID OFF
  digitalWrite(22, 1);  // PASS ON

  return true;
}


void decat() {
  if (WiFi.status() != WL_CONNECTED) {
    strcpy((char*)newResponse, (char*)room);
    digitalWrite(16, 1);  // FALID
    digitalWrite(22, 0);
    Serial.println("WiFi not connected!");
    return;
  }
  HTTPClient http;
  String url = "http://yousef7784.pagekite.me/api/decat";
  http.begin(url);
  http.addHeader("Content-Type", "application/json");

  String jsonPayload = "{\"id\":\"1\","
                       "\"battery\":\""
                       + String(batteryValue) + "\","
                                                "\"electrical\":\""
                       + String(electricalValue) + "\","
                                                   "\"solar_battery\":"
                       + (solar_battery ? "true" : "false") + ","
                                                              "\"is_alart\":"
                       + (is_alart ? "true" : "false") + "}";
  int httpResponseCode = http.POST(jsonPayload);
  if (httpResponseCode > 0) {
    Serial.print("HTTP Response Code: ");
    Serial.println(httpResponseCode);
    String response = http.getString();
    Serial.println("Response:");
    Serial.println(response);
    if (!processResponse(response)) {
      strcpy((char*)newResponse, (char*)room);
      Serial.println("eror in 78");
    }
  } else {
    strcpy((char*)newResponse, (char*)room);
    Serial.print("Error on HTTP request: ");
    Serial.println(http.errorToString(httpResponseCode).c_str());
  }

  http.end();
}

void IRAM_ATTR onTimer(void* arg) {
   int raw = analogRead(BAT_PIN);
  float vadc = (raw / 4095.0) * 3.3;
  float vbatt = vadc * 1.39;

  

  if (vbatt >= 4.0) {
    batteryValue = 100;
  } else if (vbatt >= 3.8) {
    batteryValue = 70;
  } else if (vbatt >= 3.6) {
    batteryValue = 50;
  } else if (vbatt >= 3.3) {
    batteryValue = 20;
  } else {
    batteryValue = 0;
  }
  Serial.print("Battery Voltage: "); Serial.print(vbatt, 2); Serial.print(" V | Level: "); Serial.print(batteryValue); Serial.println(" %");

  // electrical exit
if (((analogRead(electricalValue_EXIT) / 4095.0) * 3.3) >1 ){
  electricalValue=1;
}else{
  electricalValue=0;}
// BATTEY EXIT
if (((analogRead(solar_battery_EXIT) / 4095.0) * 3.3) >1 ){
  solar_battery=1;
}else{
  solar_battery=0;} 


  if (is_alart) {
    count++;
  }
  for (int i = 0; i < 5; i++) {
    if (sw[i] > 0) {
      sw[i]++;  
    }
    if(sw[i]==4)
    sw[i]==0;
  }

  for (int i = 0; i < 4; i++) {
    if (ir[i] > 0) {
      ir[i]++;
    }
    if(ir[i]==4)
    ir[i]==0;
  }
  for (int i = 0; i < 4; i++) {
    if (fire[i] > 0) {
      fire[i]++;
    }
  }

  decat();
  Serial.println("Timer triggered every 20 seconds!");
}
// void loadRoomFromMemory() {
//   preferences.begin("my-app", true);
//   String temp = preferences.getString("room_data", "");
//   preferences.end();

//   temp.toCharArray((char*)room, sizeof(room));

//   if (strlen((const char*)room) >= 6) {
//     is_on = room[0] == '1';
//     SWITCH_senser = room[1] == '1';
//     IR_senser = room[2] == '1';
//     fire_senser = room[3] == '1';
//     sound_alart = room[4] == '1';
//     pumm_alart = room[5] == '1';
//   }
// }

void setup() {
  Serial.begin(115200);
analogReadResolution(12);  // تعيين الدقة إلى 12 بت (0 - 4095)
  
  for (int i = 0; i < sizeof(inputPins) / sizeof(inputPins[0]); i++) {
    if( i>=5 ){
    pinMode(inputPins[i], INPUT);
    }else
    pinMode(inputPins[i], INPUT_PULLUP);
  }

  for (int i = 0; i < sizeof(outputPins) / sizeof(outputPins[0]); i++) {
    pinMode(outputPins[i], OUTPUT);
    digitalWrite(outputPins[i], LOW);
  }
  digitalWrite(15, 1);
  digitalWrite(4, 1);
  digitalWrite(17, 1);
  digitalWrite(2, 0);
  digitalWrite(16, 1);  // FALID
  digitalWrite(22, 0);

  WiFi.begin(ssid, password);
  Serial.print("Connecting to Wi-Fi");
  int contacted = 0;

  while (WiFi.status() != WL_CONNECTED && contacted < 6) {
    contacted++;
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nConnected to Wi-Fi!");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());

  esp_timer_create_args_t timerArgs = {
    .callback = &onTimer,
    .arg = NULL,
    .dispatch_method = ESP_TIMER_TASK,
    .name = "MyTimer"
  };
  // loadRoomFromMemory();
  esp_timer_handle_t timerHandle;
  esp_timer_create(&timerArgs, &timerHandle);
  esp_timer_start_periodic(timerHandle, 20000000);
   loadSettings();
}

void send(int i) {
  Serial.print(pinLabels[i]);
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String url = "http://yousef7784.pagekite.me/api/dataSenser";
    http.begin(url);
    http.addHeader("Content-Type", "application/json");
    String jsonPayload = "{\"id\":\"1\",\"name\":\"" + String(pinLabels[i]) + "\",\"is_alart\":" + (is_alart ? "true" : "false") + "}";
    int httpResponseCode = http.POST(jsonPayload);
    if (httpResponseCode > 0) {
      Serial.print("HTTP Response Code: ");
      Serial.println(httpResponseCode);
      String response = http.getString();
      Serial.println("Response:");
      Serial.println(response);
      //   if (!processResponse(response)) {
      //     strcpy((char*)newResponse, (char*)room);
      //   }
      // } else {
      //   strcpy((char*)newResponse, (char*)room);
      //   Serial.print("Error on HTTP request: ");
      //   Serial.println(http.errorToString(httpResponseCode).c_str());
      // }
      http.end();
    } else {
      // strcpy((char*)newResponse, (char*)room);
      Serial.println("WiFi not connected!");
    }
    delay(100);
  }
}

// void updateRoomFromResponse() {
//   if (strlen((char*)newResponse) >= 6 && strcmp((char*)newResponse, (char*)room) != 0) {
//     preferences.begin("my-app", false);
//     preferences.putString("room_data", String((char*)newResponse));
//     preferences.end();
//     strcpy((char*)room, (char*)newResponse);
//     is_on = room[0] == '1';
//     SWITCH_senser = room[1] == '1';
//     IR_senser = room[2] == '1';
//     fire_senser = room[3] == '1';
//     sound_alart = room[4] == '1';
//     pumm_alart = room[5] == '1';
//     Serial.println(String("✅ Response updated and stored: ") + (char*)room);
//   } else {
//   }
// }

void loop() {
  if (start) {
  }  
  // updateRoomFromResponse();

  if (is_alart && count > 4) {
    digitalWrite(15, 1);
    digitalWrite(4, 1);
    digitalWrite(17, 1);
    digitalWrite(2, 0);

    count = 0;
    is_alart = false;
  }

  if (is_alart) {
    if(pumm_alart)
    digitalWrite(15, 0);
    if(alart_sound_220v)
    digitalWrite(4, 0);
    if(sound_alart)
    digitalWrite(17, 0);
    digitalWrite(2, 1);
  }

  for (int i = 0; i < 5; i++) {
    if (sw[i] > 4) {
      sw[i] = 0;
    }
    if (SWITCH_senser && is_on && sw[i] == 0 && digitalRead(inputPins[i]) == LOW) {
      sw[i] = 1;
      is_alart = true;
      Serial.print("sw  ");
      Serial.println(i);
      send(i);
    }
  }

  

  // hint nesery enable
  for (int i = 0; i < sizeof(inputPins) / sizeof(inputPins[0]); i++) {
    if (digitalRead(inputPins[i]) == HIGH && i >= 5 && i<=8 && is_on && IR_senser) {
      if (ir[i%5] == 0) {
        is_alart = true;
        send(i);
        ir[i%5] = 1;  // ابدأ العد من 1
      Serial.print("ir     ");
      Serial.println(i%5);
      }
    }
    if (digitalRead(inputPins[i]) == HIGH && i>= 9 && is_on && fire_senser) {
      if (fire[i%9] == 0) {
        is_alart = true;
        send(i);
        fire[i%9] = 1;  // ابدأ العد من 1
      Serial.print("fire     ");
      Serial.println(inputPins[i]);
      }
    }

  }
  // if (digitalRead(inputPins[i]) == LOW   ) {
  //   if (is_on) {
  //     is_alart = true;
  //     if ((i == 7 || i == 8 || i == 9) && fire_senser) {
  //       digitalWrite(outputPins[0], 1);
  //       if (sound_alart)
  //         digitalWrite(outputPins[1], 1);
  //       if (pumm_alart)
  //         digitalWrite(outputPins[2], 1);
  //       digitalWrite(outputPins[3], 1);
  //       send(i);
  //     }
  //   }
  // }
}
