<?php

namespace App\Http\Controllers;

use App\Models\data_senser;
use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Breach_Table extends Controller
{
    public function index(){
        $notification = notifications::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $datasener=data_senser::find(Auth::id());
            return view("fram.Breach_Table", [
    'notification' => $notification,
    'datasener' => $datasener,
            ]);
    }
}
