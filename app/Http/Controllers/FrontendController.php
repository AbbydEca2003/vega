<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AboutUs;
use App\Model\Message;
use App\Model\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public  $aboutData;
    public $menuData;
    public function __construct() {
        $this->aboutData = AboutUs::all();
        $this->menuData = Menu::all();
    }

    public function getData(): View{
        $aboutData = $this->aboutData;
        $menuData = $this->menuData;
        //dd($aboutData);
        return view('frontend.welcome',['data'=>$aboutData],['menuData'=>$menuData]);
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
        //dd($db);
        $aboutData = $this->aboutData;
        $menuData = $this->menuData;
        return view('frontend.welcome',['data'=>$aboutData],['menuData'=>$menuData]);
    }
}
