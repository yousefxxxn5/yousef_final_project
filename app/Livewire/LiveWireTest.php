<?php

namespace App\Livewire;

use App\Events\MyEvent;
use App\Http\trit\api_trair;
use App\Models\controll_panel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireTest extends Component
{
    use api_trair;
public $buttonDisabled = false;
public $countdown ;

public function tick()
{
    if ($this->countdown > 0) {
        $this->countdown--;
    }

    if ($this->countdown === 0) {
        $this->buttonDisabled = false;
    }
}

public function disableButtonsTemporarily()
{
    $this->countdown = 20;
       $this->buttonDisabled = true;
        $this->dispatch('start-timer');


}
    public function alart()
    {
        $this->disableButtonsTemporarily();
        event(new MyEvent("alart"));
        // session()->flash('message', 'تم إرسال تنبيه!');

    }

    public function AcAlart()
    {
        event(new MyEvent("Ac_alart"));
        $this->disableButtonsTemporarily();

        session()->flash('message', 'تم إرسال تنبيه!');
    }
    public function boom_tast()
    {
        event(new MyEvent("boom_tast"));
        session()->flash('message', 'تم إرسال تنبيه!');
        $this->disableButtonsTemporarily();

    }
    public function testAction()
    {
        sleep(1);
        $data = controll_panel::find(Auth::id());
        $m = $this->test_trial(Auth::id(), "test");
        $data->test = 1;
        $data->save();
        $data->test = 0;
        $data->save();
        // منطق الإجراء الذي سيتم تنفيذه عند الضغط على الزر
        session()->flash('message', 'تم تنفيذ الإجراء بنجاح!');
    }
    public function render()
    {
        return view('livewire.live-wire-test');
    }
}
