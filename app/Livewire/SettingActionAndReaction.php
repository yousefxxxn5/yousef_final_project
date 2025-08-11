<?php

namespace App\Livewire;

use App\Models\controll_panel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Laravel\Prompts\warning;

class SettingActionAndReaction extends Component
{
    public $IR_senser;
public $SWITCH_senser=true;
public $fire_senser;
public $alart_sound;
public $send_sms;
public $send_whatapp;
public $send_telegram;
public $send_pumm;
public $send_eleictrical;
public $send_network;
public function mount()
{
    $panel = controll_panel::find(Auth::id());

    // logger()->warning($panel);

    $this->IR_senser         = (bool) $panel->IR_senser;
    $this->SWITCH_senser     = (bool) $panel->SWITCH_senser;
    $this->fire_senser       = (bool) $panel->fire_senser;
    $this->alart_sound       = (bool) $panel->alart_sound;
    $this->send_sms          = (bool) $panel->send_sms;
    $this->send_whatapp      = (bool) $panel->send_whatapp;
    $this->send_telegram     = (bool) $panel->send_telegram;
    $this->send_pumm         = (bool) $panel->send_pumm;
    $this->send_eleictrical  = (bool) $panel->send_eleictrical;
    $this->send_network      = (bool) $panel->send_network;
}

public function updated($propertyName)
{

    $panel = controll_panel::find(Auth::id());
    $panel->{$propertyName} = $this->{$propertyName};

    $panel->save();
}

   public function save()
{
    $panel = controll_panel::find(Auth::id());


    $panel->IR_senser = $this->IR_senser;
    $panel->SWITCH_senser = $this->SWITCH_senser;
    $panel->fire_senser = $this->fire_senser;
    $panel->alart_sound = $this->alart_sound;
    $panel->send_sms = $this->send_sms;
    $panel->send_whatapp = $this->send_whatapp;
    $panel->send_telegram = $this->send_telegram;
    $panel->send_pumm = $this->send_pumm;
    $panel->send_eleictrical = $this->send_eleictrical;
    $panel->send_network = $this->send_network;

    $panel->save();

    // session()->flash('message', 'تم الحفظ بنجاح!');
}

    public function render()
    {
        return view('livewire.setting-action-and-reaction');
    }
}
