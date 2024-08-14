<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{
    public function getData(){
        $slider = Slider::all();
        return view('backend.slider',compact('slider'));
    }
}
