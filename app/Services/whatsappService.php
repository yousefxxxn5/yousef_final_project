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
        public $sid = "AC73871847f070c5b50083b1b1c0374704";
        public $token = "65b1ff2e56ca6e214fbb62d70a4c04ee";
    public function __construct()
    {


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
