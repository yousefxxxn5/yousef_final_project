<?php

namespace App\Livewire;

use App\Models\sms;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSms extends Component
{
    public $name;
    public $phone_number;

    public $users;
    public $edit_number;
    public function mount()
    {

        $this->users = sms::where('exid', Auth::id())->get();
    }
    public function addSmsListener()
    {
        $sms = new sms();
        $sms->exid = Auth::id();
        $sms->save();
        $this->users = sms::where('exid', Auth::id())->get();
    }
    public function updateRole($id, $newRole)
    {
        $user = sms::find($id);
        if ($user) {
            $user->role = $newRole;
            $user->save();
            $this->users = sms::where('exid', Auth::id())->get();
            session()->flash('message', 'تم تحديث الصلاحيات.');
        }
    }
     public function delete($id)
    {

        $user = sms::find($id);
        if ($user) {
            $user->delete();
            $this->users = sms::where('exid', Auth::id())->get();

            session()->flash('message', 'تم حذف المستخدم.');
        }
    }
  public function edit($id)
    {


            $sms=sms::where('id',$id)->first();
            $this->name=$sms->name;
            $this->phone_number=$sms->phone_number;
            $this->edit_number=$id;
            logger($id);
        
    }
  public function cansel($id)
    {
        $this->edit_number=-1;
        logger($id);
    }
  public function save($id)
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone_number' => 'required|numeric|digits_between:9,12',
        ]);
        $sms=sms::where('id',$id)->first();
        $sms->phone_number=$this->phone_number;
        $sms->name=$this->name;
        $sms->state=1;
        $sms->save();
        logger($this->phone_number);
        $this->edit_number=-1;
        $this->users = sms::where('exid', Auth::id())->get();
    }
    public function render()
    {
        return view('livewire.user-sms');
    }
}
