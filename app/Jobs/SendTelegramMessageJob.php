<?php

namespace App\Jobs;

use App\Models\telegram;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTelegramMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $message;
    protected $botToken;
    protected $permission;
    public function __construct($id, $message, $permission = "all")
    {
        // \Log::info('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx is running!');
        $this->id = $id;
        $this->message = $message;
        $this->botToken = '7759882800:AAFy-m_JzQJC10Q85C391u_ym-dxVVrueFs'; // من الأفضل استخدام env
        $this->permission = $permission;
    }

    public function sendMessage($chatId, $message)
    {
        $client = new Client(['base_uri' => 'https://api.telegram.org']);

        $url = "/bot{$this->botToken}/sendMessage";
        $response = $client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $message,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function handle()
    {

        $sender = telegram::where('id_user', $this->id)
            ->where('state', 1)
            ->first();
        if (!$sender)
            return;
        $foruser = $sender->foruser;
        try {
        } catch (\Throwable $e) {
            logger()->error('حدث خطأ: ' . $e->getMessage());
        }
        if (strcasecmp($this->permission, 'all') === 0) {

            $users = telegram::where('exid', $foruser)
                ->where('state', 1)
                ->get();
        }
        if (strcasecmp($this->permission, 'admin') === 0) {
            $users = telegram::where('exid', $foruser)
                ->where('state', 1)
                ->where('role', 'Admin')
                ->get();

        }
        if (strcasecmp($this->permission, 'one') === 0) {
            $users = telegram::where('id_user', $this->id)
                ->where('state', 1)
                ->get();

        }
        if($users->isEmpty()){
            print('\n empty \n');
            return ;
        }
        logger($users);
        foreach ($users as $user) {
            $this->sendMessage($user->id_user, $this->message);
            echo "USER ID: {$user->id_user}\n";
        }
    }
}
