<?php

namespace Database\Seeders;

use App\Jobs\SendTelegramMessageJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class telegramTast extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        SendTelegramMessageJob::dispatch(1351024593, 'عذرا الجهاز غير متصل','all');
    }
}
