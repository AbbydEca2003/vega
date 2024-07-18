<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Model\Message;

class MessageController extends Controller
{
    public function getMessage(): View{
        $message=Message::all();
        return view('backend.message',['message'=>$message]);
    }

    public function sendMessage(Request $request) :RedirectResponse{
        return view('backend.messsage');
    }
}
