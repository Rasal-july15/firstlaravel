<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IconController extends Controller
{
    //add icon
    public function addIcon(){
        return view('admin.add_icon');
    }
    //all icon
    public function allIcon(){
        return view('admin.all_icon');
    }
}
