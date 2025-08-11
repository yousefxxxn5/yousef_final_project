<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class whatsappService
{
    private $botToken;
    private $chatId;
    private $httpClient;
        public $sid ;
        public $token ;
    public function __construct()
    {
   $this->sid = env('TWILIO_SID');
    $this->token = env('TWILIO_TOKEN');

    }
    public function sendMessage( $id , $name)
    {
        $many=User::where('id',$id)->first();
        if($many){
        $many->many=$many->many - 0.01;
        $many->save();
    }
        try {

            $twilio = new Client($this->sid, $this->token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:".$id ,
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => $name
                    )
                );
        } catch (\Exception $e) {
        }
        return 0;
    }
}
