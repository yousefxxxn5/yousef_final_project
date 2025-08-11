<?php

namespace App\Livewire;

use App\Models\notifications;
use Livewire\Component;

class LiveWireCountNotif extends Component
{

    public  $state=0 ;
    public function refresh_notif(){
        $this->state=notifications::where("see",0)->count();
        $this->dispatch('bbbbbbbbbbbbb');
    }
    public function render()
    {
          if (!auth()->check()) {
            return ''; // أو ترجع عرض فارغ
        }
        return view('livewire.live-wire-count-notif');
    }
}
