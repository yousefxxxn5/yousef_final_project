<?php

namespace Database\Seeders;

use App\Models\buttery;
use App\Models\controll_panel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class connect extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=controll_panel::find(1);

        $data->connected=1;

        $data->save();
        $butt=buttery::find(1);
        $butt->state=1;
        $butt->change=0;
        $butt->electrical=1;
        $butt->is_solar_battery=1;
        $butt->is_alart=0;
        $butt->velue=0;
        $butt->save();

    }
}
