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

    public function removeMessage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message_id' => ['required'],
        ]);
        try{
            $message = Message::find($validated['message_id']);
            if ($message) {
                $message->delete();
                return redirect('/message')->with('success', 'Message removed successfully');
            } else {
                return redirect('/message')->with('error', 'Message not found');
            }
        }catch(Exception $e){
            return redirect('/message')->with('error', 'Error deleting message');;
        }
        
    }
}
