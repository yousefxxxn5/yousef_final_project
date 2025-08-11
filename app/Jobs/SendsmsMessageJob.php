<?php

namespace App\Jobs;

use App\Models\sms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendsmsMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $sid;
    public $token;
    public $phone_number;
    public $message;
    public $permission;
    /**
     * Create a new job instance.
     */
    public function __construct($phone_number, $message, $permission = "all")
    {
        $this->phone_number = $phone_number;
        $this->message = $message;
        $this->permission = $permission;

        $this->sid ;
        $this->token ;
        $this->sid;
        $this->token ;
    }
    public function sendMessage($phone_number, $message)
    {
        // $twilio = new Client($this->sid, $this->token);
        // $message = $twilio->messages
        //     ->create(
        //         $phone_number, // to
        //         array(
        //             "messagingServiceSid" => "",
        //             "body" => $message
        //         )
        //     );

    }

    public function handle(): void
    {
        $sender = sms::where("phone_number", $this->phone_number)
            ->where('state', 1)
            ->first();

        if (!$sender)
            return;

        $exid = $sender->exid;
        if (strcasecmp($this->permission, 'one') === 0) {
            $sms = sms::where('phone_number', $this->phone_number)
                ->where('state', 1)
                ->get();
        }
        if (strcasecmp($this->permission, 'all') === 0) {
            $sms = sms::where('exid', $exid)
                ->where('state', 1)
                ->get();
        }
        if (strcasecmp($this->permission, 'admin') === 0) {
            $sms = sms::where('exid', $exid)
                ->where('state', 1)
                ->where('role', 'Admin')
                ->get();
        }
        foreach ($sms as $send)
            $this->sendMessage($send->phone_number, $this->message);
        echo "USER ID: {$send->phone_number}\n";
    }
}
