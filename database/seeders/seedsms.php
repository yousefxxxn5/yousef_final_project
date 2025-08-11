<?php

namespace Database\Seeders;

use App\Jobs\SendsmsMessageJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Twilio\Rest\Client;

class seedsms extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            SendsmsMessageJob::dispatch('+967770018190', "جاري تشغيل الجهاز");


    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md


    // $sid    = "AC99e8e9dc79f2a8e338400ed69457dc70";
    // $token  = "a6376fad198ff4353eef3bc28bca9bf6";
    // $twilio = new Client($sid, $token);
    // $message = $twilio->messages
    //   ->create("+967770018190", // to
    //     array(
    //       "messagingServiceSid" => "MGd315d2b11946aaba02c712028798c028",
    //       "body" => "yousef"
    //     )
    //   );
// print($message->sid);


    }
}
