<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Model\User;
use App\Model\AboutUs;

class AboutController extends Controller
{
    public function getAbout(): View{
       
        $about=AboutUs::all();
        return view('backend.about',['about'=>$about]);
    }


    public function setAbout(Request $request): RedirectResponse
    {
        $about = AboutUs::find(1);
        $data = $request->validate([
            'company_name' => ['required'],
            'office' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'twitter' => ['required'],
            'facebook' => ['required'],
            'linkedin' => ['required'],
        ]);
        $about->Company_name = $data['company_name'];
        $about->address = $data['office'];
        $about->phone = $data['phone'];
        $about->email = $data['email'];
        $about->twitter = $data['twitter'];
        $about->facebook = $data['facebook'];
        $about->linkedin = $data['linkedin'];

        $about->save();
        return redirect('/about')->with('success','Data update success');
        
    }
}
