<?php

namespace App\Http\Controllers;

use App\Http\trit\api_controll;
use App\Http\trit\api_trair;
use App\Models\buttery;
use App\Models\controll_panel;
use App\Models\data_senser;
use App\Services\many_twilio;
use App\Services\notificationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controll__api extends Controller
{
    use api_trair;
    public function decat(Request $request)
    {
        logger()->notice($request . 'decat');
        $info_battery = $request->json()->all();

        // استخراج القيم من البيانات
        $id = $info_battery['id'] ?? null;
        $battery = $info_battery['battery'] ?? null;
        $electrical = $info_battery['electrical'] ?? null;
        $solar_battery = $info_battery['solar_battery'] ?? null;
        $is_alart = $info_battery['is_alart'] ?? false;


        $buttery = buttery::where('id', $id)->first();
        $data = controll_panel::find($id)->first();
        // \Log::info("button_state: " . $name . '    id user:  ' . $id);
        // $many = new many_twilio;
        // $s = $many->getBalance();
        // \Log::info($s);

        // if ($buttery->state == 0) {
        // اذا حدث شيء في الاداء المشكله هنا بسبب التغير التعليق
        $buttery->state = 1;
        $buttery->change = 1;
        $buttery->velue = $battery;

        $buttery->electrical = $electrical;
        $buttery->is_solar_battery = $solar_battery;
        $buttery->is_alart = $is_alart;
        $buttery->save();
        // }
        if ($data->connected == 0) {
            $data->connected = 1;
            $data->save();
        }
        return response()->json([
            'button_state' => $data->button_state,
            'SWITCH_senser' => $data->SWITCH_senser,
            'IR_senser' => $data->IR_senser,
            'fire_senser' => $data->fire_senser,
            'alart_sound' => $data->alart_sound,
            'alart_sound_220v' => $data->alart_sound_220v,
            'send_pumm' => $data->send_pumm,
        ]);

        // return $data->button_state . "" . $data->SWITCH_senser . '' . $data->IR_senser . '' . $data->fire_senser . '' . $data->alart_sound . '' . $data->send_pumm;
    }

    public function dataSenser(Request $request)
    {
        $data = $request->json()->all();
        logger()->warning($request);

        $id = $data['id'] ?? null;
        $name = $data['name'] ?? null;
        logger()->warning($request);
        $data = controll_panel::find($id);

        if ($data->button_state) {
            try {

                $data_senser = data_senser::where('id', $id)->pluck($name)->first();
            } catch (\Throwable $th) {
                logger()->warning('catch errer');
                return 200;
            }

            if (!$data_senser) {
                return 200;
            }
            if (str_contains($name, 'SW') && $data->SWITCH_senser) {
                $text = '⚠️ تنبيه أمني: تم اكتشاف محاولة اختراق في مفتاح : ' . $data_senser . '.';
            } elseif (str_contains($name, 'IR') && $data->IR_senser) {
                $text = '⚠️ تنبيه أمني: تم اكتشاف حركة مريبة بواسطة مستشعر الأشعة تحت الحمراء الخاص بل : ' . $data_senser . '.';
            } elseif (str_contains($name, 'fire') && $data->fire_senser) {
                $text = '🔥 إنذار طارئ: تم رصد حالة حريق عبر مستشعر حريق: ' . $data_senser . '.';
            } else {
                return 200;
            }
            $notif = new notificationsService($id, $data_senser, $name, $text, 0, "noimg");
            $notif->save();
            return $this->api_controll($id, $text);
        } else {
            return 200;
        }
    }

}
