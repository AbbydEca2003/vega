<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service;

class ServiceController extends Controller
{
    public function getService(){
        $service = Service::all();
        return view('backend.service',['service' => $service]);
    }

    public function setService(Request $request){
        $data = $request->validate([
            'title' => ['required'],
            'message' => ['required'],
        ]);
        $service = new Service;
        $service->title = $data['title'];
        $service->message = $data['message'];
        $service->save();
        return redirect('/service')->with('success','Data update success');
    }

    public function editService(Request $request){
        
        $data = $request->validate([
            'title' => ['required'],
            'message' => ['required'],
            'user_id' => ['required'],
        ]);
        if($request->input('submit') === 'Save'){
            $service = Service::find($data['user_id']);
            $service->title = $data['title'];
            $service->message = $data['message'];
            $service->save();
            return redirect('/service')->with('success','Data update success');
        }
        else{
            Service::destroy($data['user_id']);
            return redirect('/service')->with('success','User removed success');
        }
    }

    public function removeService(Request $request): RedirectResponse{
        $service = $request->validate([
            'title' => ['required'],
            'message' => ['required'],
            'user_id' => ['required', 'integer'],
        ]);
        
    }
}
