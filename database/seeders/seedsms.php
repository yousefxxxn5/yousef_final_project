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





    }
}
