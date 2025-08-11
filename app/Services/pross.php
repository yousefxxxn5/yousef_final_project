<?php

namespace App\Services;

use App\Models\buttery;
use App\Models\controll_panel;
use Twilio\Rest\Client;

class pross
{
    private $data;
    public $control_panel;

    public function __construct()
    {

        // $this->data=controll_panel::where('button_state',true)->where('connected','0')->where('sending','0')->get();
        // foreach ($this->data as $value) {
        //     // $value->sending=0;

        //     $value->save();
        //     \Log::info('erroe'. $value);
        // }

        // $refesh_divces=controll_panel::where('button_state',true)->get();
        // foreach ($refesh_divces as $value) {
        //      $value->connected=0;
        //     $value->save();
        //     \Log::info('erroe'. $value);
        // }

        $refesh_setting = buttery::all();
        foreach ($refesh_setting as $value) {
            $this->control_panel=controll_panel::find($value->id);
            if ($value->state) {
                 $this->control_panel->connected=1;
                  $this->control_panel->save();
                \Log::info('okk' . $value);
            } else {
                 $this->control_panel->connected=0;
                  $this->control_panel->save();
                $value->velue = -1;
                $value->electrical = 0;
                $value->change = 0;
                $value->is_alart = 0;
                $value->is_solar_battery = 0;
                \Log::info('erroe in buttery' . $value);
            }
            
            $value->state = 0;
            $value->save();

        }

    }
    public function get_data()
    {
        return $this->data;
    }
    public function sendMessage()
    {
        return $this->data;
    }
}
