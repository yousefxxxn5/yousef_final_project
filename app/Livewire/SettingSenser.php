<?php

namespace App\Livewire;

use App\Models\controll_panel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SettingSenser extends Component
{
   public $control;

    public $IR_senser = false;
    public $SWITCH_senser = false;
    public $fire_senser = false;
    public $alart_sound = false;
    public $send_whatapp = false;
    public $send_sms = false;
    public $send_telegram = false;
    public $send_pumm = false;
    public $send_eleictrical = false;
    public $send_network = false;

    public function mount()
    {
        $this->control = controll_panel::find(auth::id()); // أو: Settings::where('user_id', Auth::id())->first();

        $this->IR_senser        = (bool) $this->control->IR_senser;
        $this->SWITCH_senser    = (bool) $this->control->SWITCH_senser;
        $this->fire_senser      = (bool) $this->control->fire_senser;
        $this->alart_sound      = (bool) $this->control->alart_sound;
        $this->send_whatapp     = (bool) $this->control->send_whatapp;
        $this->send_sms         = (bool) $this->control->send_sms;
        $this->send_telegram    = (bool) $this->control->send_telegram;
        $this->send_pumm        = (bool) $this->control->send_pumm;
        $this->send_eleictrical = (bool) $this->control->send_eleictrical;
        $this->send_network     = (bool) $this->control->send_network;
    }

    // ⚡ يتم تنفيذها عند تغيير أي قيمة
    public function updated($propertyName, $value)
    {
        
        if (!in_array($propertyName, [
            'IR_senser', 'SWITCH_senser', 'fire_senser',
            'alart_sound', 'send_whatapp', 'send_sms',
            'send_telegram', 'send_pumm', 'send_eleictrical',
            'send_network'
        ])) return;
        $control = controll_panel::find(auth::id()); // أو: Settings::where('user_id', Auth::id())->first();

        $control->{$propertyName} = $value ? 1 : 0;
        $control->save();
    }

    public function render()
    {
        return view('livewire.setting-senser');
    }
}
