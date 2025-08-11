<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;
    public $uploadedPhotoUrl;
public $pic;
public $img_name;

public function mount(){
$this->img_name=User::find(Auth::id())->photo;

}
    public function save()
    {
        $this->validate([
            'pic' => 'image|max:1024',
        ]);

        $name = 'photo_' . time() . '.' . $this->pic->getClientOriginalExtension();
        $this->img_name=$name;
        $this->pic->storeAs('public/img', $name);
        $photos=User::find(Auth::id());
        $photos->photo=$name;
        $photos->save();
        session()->flash('message', 'تم حفظ الصورة بنجاح!');
    }

    public function render()
    {
        return view('livewire.upload-photo');
    }
}
