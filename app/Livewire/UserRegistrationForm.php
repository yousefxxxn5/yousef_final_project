<?php

namespace App\Livewire;

use App\Models\sms;
use App\Models\telegram;
use App\Models\User;
use App\Models\whatsapp;
use App\Services\TelegramService;
use App\Services\whatsappService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserRegistrationForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $countryCode = '';

    protected $rules = [
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[0-9]/',

            'confirmed',
        ],
    ];
    public $stateTelegram;
    public $statewhatapp;
    public $password;
    public $id;
    public $number_test;
    public $password_confirmation;
    public $teleurl;
    public $whatsappUrl;

    public function mount($id, $number_test)
    {
        $this->countryCode = '+967'; 
        $this->statewhatapp = whatsapp::where('exid', $this->id)->first()->state;
        $this->stateTelegram = telegram::where('exid', $id)->first()->state;
        $statewhatapp_number_test = whatsapp::where('exid', $id)->first()->number_test;
        $this->id = $id;
        $this->number_test = $number_test;
        $this->whatsappUrl = "https://wa.me/+14155238886?text=" . urlencode(whatsapp::where('exid', $id)->first()->number_test);
        $this->teleurl = "https://t.me/yamin77846_bot?start=" . urlencode($number_test);
    }
    public function whatsapp_model()
    {

        $this->statewhatapp = whatsapp::where('exid', $this->id)->first()->state;
        if (!$this->statewhatapp)
            $this->dispatch('whatsapp-added');
    }


public function submit()
{


    $fullPhoneNumber = $this->countryCode . $this->phone;

    // تابع التنفيذ مثل الإرسال أو الحفظ...
}

    public function telegram_model()
    {

        $this->stateTelegram = telegram::where('exid', $this->id)->first()->state;
        if (!$this->stateTelegram)
            $this->dispatch('open-telegram-modal');
    }
    public function register()
    {
        logger( $this->countryCode );
         $this->validate([
        'countryCode' => 'required',
        'phone' => 'required|numeric',
    ]);
        $this->validate();
        $this->phone = $this->countryCode . $this->phone;
        $data = User::where('id', $this->id)->first();
        $tele = telegram::where('id', $this->id)->first();
        $what = whatsapp::where('id', $this->id)->first();
        if (!$tele) {
            session()->flash('x', ' عذرا انت لست مسجل في تيلجرام');
            // session()->flash('x', $this->id ."sdffffff");
            // $this->reset();
            return;
        }
        if (!$what) {
            session()->flash('x', ' عذرا انت لست تدخل حساب وتساب');
            // session()->flash('x', $this->id ."sdffffff");
            // $this->reset();
            return;
        }
        //state is تطوير لا اخذ التوكن وخاصة بتشفير
        if ($tele->state && $what->state) {
            if (!$data)
                return 0;
            $data->name = $this->name;
            $data->email = $this->email;
            $data->activeDate = now();
            $data->state = 1;
            $data->state_user_serial = 1;
            $data->password = Hash::make($this->password);
            $data->phone_number = $this->phone;
            $data->save();
            $sms=sms::where('exid', $this->id)->first();
            $sms->name=$this->name;
            $sms->phone_number=$this->phone;
            $sms->state=1;
            $sms->save();


            session()->flash('success', 'Registration successful!');

            $telegramService = new TelegramService($tele->id_user);
            $response = $telegramService->sendMessage($tele->name . " مرحبا بك  ");
            $telegramService = new whatsappService();
            $response = $telegramService->sendMessage($what->id_user, $tele->name . " مرحبا بك  ");
            // event(new MyEvent('hello world'));

            return redirect()->route("login", )->with("register", 'تم التسجيل بنجاح');
        } else {
            if (!$tele->state)
                session()->flash('x', 'اضغط على زر التلجرام');
            if (!$what->state)
                session()->flash('x', 'اضغط على زر الوتساب');
        }
        // $this->reset();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.user-registration-form');
    }
}
