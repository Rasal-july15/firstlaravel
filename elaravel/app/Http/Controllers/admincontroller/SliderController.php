<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //add slider
    public function addSlider(){
        return view('admin.add_slider');
    }
    //all slider
    public function allSlider(){
        return view('admin.all_slider');
    }
}
