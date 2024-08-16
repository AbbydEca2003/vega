<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AboutUs;
use App\Model\Message;
use App\Model\Menu;
use App\Model\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Model\Slider;

class FrontendController extends Controller
{
    public  $aboutData;
    public $menuData;
    public function __construct() {
        $this->aboutData = AboutUs::all();
        $this->menuData = Menu::all();
    }

    public function getData(): View{
        $page=Page::all();
        $slider = Slider::all();
        $aboutData = $this->aboutData;
        $menuData = $this->menuData;
        //dd($status);
        return view('frontend.welcome',compact('file', 'aboutData', 'menuData','page', 'slider'));
    }

    public function setMessage(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required'],
        'message' => ['required'],
    ]);

    // Save the message to the database
    $db = new Message();
    $db->name = $validated['name'];
    $db->email = $validated['email'];
    $db->phone = $validated['phone'];
    $db->message = $validated['message'];
    $db->save();

    // Retrieve data needed for the homepage
    $page = Page::all();
    $slider = Slider::all();
    $aboutData = $this->aboutData;
    $menuData = $this->menuData;

    // Redirect to homepage with data and success message
    return redirect('/')
        ->with(compact('aboutData', 'menuData', 'page', 'slider'))
        ->with('success', 'Your message has been successfully sent.');
}

}
