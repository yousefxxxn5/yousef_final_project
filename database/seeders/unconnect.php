<?php

namespace Database\Seeders;

use App\Models\controll_panel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class unconnect extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=controll_panel::find(1);
        // $buttery=
        $data->connected=0;
        $data->save();
    }
}
