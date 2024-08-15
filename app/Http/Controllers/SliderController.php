<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function getSlide(){
        $slider = Slider::all();
        return view('backend.slider',compact('slider'));
    }

    public function setSlide(Request $request): RedirectResponse{
           
        $data = $request->validate([
            'image'=>'required|mimes:jpeg,png',
            'slide_title' => ['required'],
            'slide_sub_title' => ['required'],
            'is_active' => 'nullable|boolean',
        ]);

        $button_title = $request->input('button_title');
        $button_link = $request->input('button_link');
        if(!$button_title){
            $button_title = "";
            $button_link = "";
        }
        $slide = new Slider();
        if ($request->hasFile('image')){
            $slide->slide_title = $data['slide_title'];
            $slide->slide_sub_title = $data['slide_sub_title'];
            $slide->button_title = $button_title;
            $slide->button_link = $button_link;
            $slide->slide_link = 'dsd';
            $slide->is_active = $request->has('is_active') ? 1 : 0;
            $slide->save();

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);

            return redirect('/slide')->with('success','Data update success');
        }else{
            return back()->with('error', 'No image selected');
        }
       
    }

    public function editSlide(Request $request){
        dd($data);
        $data = $request->validate([
            'slide_title' => ['required'],
            'slide_sub_title' => ['required'],
            'button_title' => 'nullable',
            'button_link' =>  'nullable',
            'slide_id' => ['required'],
            'is_active' => 'nullable|boolean',
        ]);
        
            $slideId = $data['slide_id'];
            $slide = Slider::find($slideId);
            $slide->slide_title = $data['slide_title'];
            $slide->slide_sub_title = $data['slide_sub_title'];
            $slide->button_title = $button_title;
            $slide->button_link = $button_link;
            $slide->slide_link = 'dsd';
            $slide->is_active = $request->has('is_active') ? 1 : 0;
            $slide->save();
            return redirect('/slide')->with('success','Data update success');
    }

    public function removeSlide(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'slide_id' => ['required'],
        ]);
        $slideId = $validated['slide_id'];
        $slide = Slider::find($slideId);
        $slide->delete();
        return redirect('/slide')->with('success', 'Page removed successfully');
    }
}
