<?php

namespace App\Livewire;

use App\Jobs\SendTelegramMessageJob;
use App\Jobs\SendWhatsAppMessageJob;
use App\Models\controll_panel;
use App\Models\telegram;
use App\Models\whatsapp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LiveWireButtonState extends Component
{
    public $data;
    public $isDisabled = false;
    public $countdown = 0;

    public function mount()
    {
        $this->data = controll_panel::find(Auth::id());

        if (!$this->data) {
            abort(404, 'المستخدم غير موجود في جدول controll_panel');
        }
    }

    public function buttons_state()
    {
        $this->data = controll_panel::find(Auth::id());

        if (!$this->data || $this->data->connected == '0') {
            session()->flash('off', 'عذرا الجهاز غير متصل');
            SendTelegramMessageJob::dispatch(
                telegram::where('foruser', Auth::id())->first()->id_user,
                'عذرا الجهاز غير متصل',
                'one'
            );
            SendWhatsAppMessageJob::dispatch(
                whatsapp::where('foruser', Auth::id())->first()->id_user,
                'عذرا الجهاز غير متصل',
                'Admin'
            );
            return;
        }

        $this->data->button_state = !$this->data->button_state;
        $this->data->save();

        $this->isDisabled = true;
        $this->countdown = 20;

        if ($this->data->button_state) {
            session()->flash('on', "تم تشغيل جهازك بنجاح");
            SendTelegramMessageJob::dispatch(
                telegram::where('foruser', Auth::id())->first()->id_user,
                "تم تشغيل جهازك بنجاح"
            );
            SendWhatsAppMessageJob::dispatch(
                whatsapp::where('foruser', Auth::id())->first()->id_user,
                'تم تشغيل الجهاز'
            );
        } else {
            session()->flash('off', 'تم الإيقاف بنجاح');
            SendTelegramMessageJob::dispatch(
                telegram::where('foruser', Auth::id())->first()->id_user,
                "تم إيقاف تشغيل جهازك"
            );
            SendWhatsAppMessageJob::dispatch(
                whatsapp::where('foruser', Auth::id())->first()->id_user,
                "تم إيقاف تشغيل جهازك"
            );
        }

        $this->data = controll_panel::find(Auth::id()); // إعادة التحميل
    }

    public function tickCountdown()
    {
        if ($this->isDisabled && $this->countdown > 0) {
            $this->countdown--;

            if ($this->countdown === 0) {
                $this->isDisabled = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.live-wire-button-state', [
            'data' => $this->data,
        ]);
    }
}
