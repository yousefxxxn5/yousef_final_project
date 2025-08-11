<?php

namespace App\Http\Controllers;

use App\Jobs\SendWhatsAppMessageJob;
use App\Models\controll_panel;
use App\Models\whatsapp;
use App\Services\whatsappService;
use Illuminate\Http\Request;

class whatsappControll extends Controller
{
    public function handleWebhook(Request $request)
    {
        $data = $request->all();
        logger($request);
        $whatsappService = new whatsappService();
        $smsMessageSid = $data['SmsMessageSid'];
        $profileName = $data['ProfileName'];
        $messageType = $data['MessageType'];
        $body = $data['Body'];
        $from = $data['From'];
        $from = str_replace("whatsapp:", "", $from);
        $to = $data['To'];
        $what = whatsapp::where('id_user', $from)->first();
        if ($what) {
            $control = controll_panel::find($what->foruser)->first();
            if ($control->connected == 0) {
                // $response = $whatsappService->sendMessage($what->id_user, "عذرا \n الجهاز غير متصل");
                            SendWhatsAppMessageJob::dispatch($what->id_user, "عذرا \n الجهاز غير متصل");

                logger()->warning("no connected");
                return response('Message received', 200);
            }
            return $this->processExistingUser($what, $body);
        }
        $what = whatsapp::where('number_test', $body)->first();
        if ($what) {
            if ($what->state == 1) {
                // $response = $whatsappService->sendMessage($what->id_user, " عذرا \n المستخدم موجود بل فعل");
                SendWhatsAppMessageJob::dispatch($what->id_user, " عذرا \n المستخدم موجود بل فعل",'one');

                logger()->warning("the user is exit rellay");
                return response('Message received', 200);
            }
            return $this->registerNewUser($what, $profileName, $from);
        }
        return response('OK', 200);
    }
    private function processExistingUser($what, $body)
    {

        $whatsappService = new whatsappService();
        $control = controll_panel::find($what->id)->first();

        if ($body == 'تشغيل') {
            $this->handleStartCommand($control, $whatsappService, $what);
        }

        if ($body == 'ايقاف') {
            $this->handleStopCommand($control, $whatsappService, $what);
        }

        return response()->json(['status' => 'ok']);
    }

    private function handleStartCommand($control, $whatsappService, $what)
    {
        if ($control->button_state) {
            // $response = $whatsappService->sendMessage($what->id_user, "الجهاز يعمل بل فعل");
            SendWhatsAppMessageJob::dispatch($what->id_user, "الجهاز يعمل بل فعل", 'one');

            logger("الجهاز يعمل بل فعل");
        } else {
            $control->button_state = 1;
            $control->save();
            // $response = $whatsappService->sendMessage($what->id_user, "جاري تشغيل الجهاز");
            SendWhatsAppMessageJob::dispatch($what->id_user, '  تم تشغيل الجهاز ');
            logger("جاري تشغيل الجهاز");
        }
    }

    private function handleStopCommand($control, $whatsappService, $what)
    {
        if (!$control->button_state) {
            // $response = $whatsappService->sendMessage($what->id_user, "الجهاز لا يعمل بل فعل");
            SendWhatsAppMessageJob::dispatch($what->id_user, "الجهاز لا يعمل بل فعل", 'one');

            logger("الجهاز لا يعمل بل فعل");
        } else {
            $control->button_state = 0;
            $control->save();
            // $response = $whatsappService->sendMessage($what->id_user, "تم ايقاف الجهاز");
            SendWhatsAppMessageJob::dispatch($what->id_user, "تم ايقاف الجهاز");
            logger(" تم ايقاف الجهاز");
        }
    }

    private function registerNewUser($what, $profileName, $from)
    {
        $what->name = $profileName;
        $what->id_user = $from;
        $what->state = 1;
        $what->save();
        logger($what);

        return response('Message received', 200);
    }

}
