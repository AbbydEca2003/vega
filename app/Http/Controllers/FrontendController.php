<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AboutUs;
use App\Model\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public  $data;
    public function __construct() {
        $this->data = AboutUs::all();
    }

    public function getData(): View{
        $data = $this->data;
        return view('frontend.welcome',['data'=>$data]);
    }

    public function setMessage(Request $request): View{
        $message = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'message' => ['required'],
        ]);
        $db = new Message();
        $db->name = $message['name'];
        $db->email = $message['email'];
        $db->phone = $message['phone'];
        $db->message = $message['message'];
        $db->save();
        $data = $this->data;
        return view('frontend.welcome',['data'=>$data]);
    }
}
