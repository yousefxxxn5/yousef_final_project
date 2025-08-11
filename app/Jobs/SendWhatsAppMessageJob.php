<?php

namespace App\Jobs;

use App\Models\whatsapp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Twilio\Rest\Client;

class SendWhatsAppMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $name;
    private $phone;
    protected $permission;

    // public $sid = "AC73871847f070c5b50083b1b1c0374704";
    // public $token = "65b1ff2e56ca6e214fbb62d70a4c04ee";
    public $sid ;
    public $token;

    public function __construct($phone, $name)
    {
        $this->phone = $phone;
        $this->name = $name;
    }
    public function handle(): void
    {
        try {
            if (strcasecmp($this->permission, 'all') === 0) {

                $whts = Whatsapp::where("id_user", $this->phone)
                    ->where('state', 1)
                    ->get();
                logger()->warning($whts);
            }
            if (strcasecmp($this->permission, 'admin') === 0) {
                $whts = Whatsapp::where("id_user", $this->phone)
                    ->where('state', 1)->role('Admin')
                    ->get();
                logger()->warning($whts);
            }
            if (strcasecmp($this->permission, 'one') === 0) {
                $whts = Whatsapp::where('id_user', $this->phone)
                    ->where('state', 1)
                    ->get();
                logger()->warning($whts);
            }
            if ($whts->isNotEmpty()) {
                $twilio = new Client($this->sid, $this->token);
                foreach ($whts as $row) {
                    // $twilio->messages->create(
                    //     "whatsapp:" . $row->id_user,
                    //     [
                    //         'from' => 'whatsapp:+14155238886',
                    //         'body' => $this->name . $row->id,
                    //     ]
                    // );
                }
            }
        } catch (\Exception $e) {
            \Log::error('WhatsApp message failed: ' . $e->getMessage());
        }
    }
}

