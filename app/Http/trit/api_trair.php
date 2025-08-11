<?php

namespace App\Http\trit;

use App\Jobs\SendTelegramMessageJob;
use App\Jobs\SendWhatsAppMessageJob;
use App\Models\controll_panel;
use App\Models\telegram;
use App\Models\whatsapp;
use App\Services\TelegramService;
use App\Services\whatsappService;
use Twilio\Rest\Client;

trait api_trair
{

    public function sendtelegram($id, $name)
    {
        $tele = telegram::where('id', $id)->first();
        if ($tele) {
            SendTelegramMessageJob::dispatch(telegram::where('foruser', $id)->first()->id_user, $name);
        }
    }
    public function sendSms($id, $name)
    {
        if ($id == 1010) {
            $name = 'SMS Successfully';
        }
        $account_sid = 'AC6e83dd209ff5269ee373e326d3071bec';
        $auth_token = '0193a1a83c5a1223315f9428fe3e29e3';
        $twilio_number = '+19093216351';

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            '+967711089421',
            array(
                'from' => $twilio_number,
                'body' => $name
            )
        );
    }

    public function sendWhatsapp($id, $name)
    {
        $what = whatsapp::where('id', $id)->first();
        if ($what) {
            // SendTelegramMessageJob::dispatch(telegram::where('foruser', $id)->first()->id_user, $name);
            // SendWhatsAppMessageJob::dispatch(whatsapp::where('foruser', $id)->first()->id_user, $name);
        }
    }

    public function test_trial($id, $name)
    {
        // \Log::notice("test:   " . $name ."         id= ". $id);
        // \Log::notice("test:   "  . $name . "         id= ".  $id);
        // \Log::notice("test:   "  . $name ."         id= ". $id);
        return 200;
    }

    public function api_controll($id, $name)
    {
        $data = controll_panel::find($id);
        if ($data->button_state == 1) {

            if ($data->send_whatapp) {
                 logger('whatsapp is on');
                $this->sendWhatsapp($id, $name);
            }
            else
                logger('whatsapp is off');

            if ($data->send_sms) {

                // $this->sendSms($id, $name);
            }

            if ($data->send_telegram) {
                $this->sendtelegram($id, $name);
            }
        }
    }
}
