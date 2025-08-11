<?php

namespace App\Livewire;

use App\Models\controll_panel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeviceSettings extends Component
{
  public $IR_senser = 0;
    public $SWITCH_senser = 0;
    public $fire_senser = 0;
    public $alart_sound = 0;
    public $saaaq_electrical = 0;
    public $send_whatapp = 0;
    public $send_emil = 0;
    public $send_pumm = 0;
    public $send_eleictrical = 0;
    public $send_network = 0;

    public function mount()
    {
        $data = controll_panel::find(Auth::id());
        if ($data) {
            $this->IR_senser = $data->IR_senser;
            $this->SWITCH_senser = $data->SWITCH_senser;
            $this->fire_senser = $data->fire_senser;
            $this->alart_sound = $data->alart_sound;
            $this->saaaq_electrical = $data->saaaq_electrical;
            $this->send_whatapp = $data->send_whatapp;
            $this->send_emil = $data->send_telegram;
            $this->send_pumm = $data->send_pumm;
            $this->send_eleictrical = $data->send_eleictrical;
            $this->send_network = $data->send_network;
        }
    }

    public function updateSettings()
    {
        $data = controll_panel::find(Auth::id());
        if ($data) {
            $data->update([
                'IR_senser' => $this->IR_senser,
                'SWITCH_senser' => $this->SWITCH_senser,
                'fire_senser' => $this->fire_senser,
                'alart_sound' => $this->alart_sound,
                'saaaq_electrical' => $this->saaaq_electrical,
                'send_whatapp' => $this->send_whatapp,
                'send_telegram' => $this->send_emil,
                'send_pumm' => $this->send_pumm,
                'send_eleictrical' => $this->send_eleictrical,
                'send_network' => $this->send_network,
            ]);

            session()->flash('message', 'تم تحديث الإعدادات بنجاح!');
        }
    }

    public function render()
    {
        return view('livewire.device-settings');
    }
}
