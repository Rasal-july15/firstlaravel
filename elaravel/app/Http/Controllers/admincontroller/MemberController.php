<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //add member
    public function addMember(){
        return view('admin.add_member');
    }
    //all member
    public function allMember(){
        return view('admin.all_member');
    }
}//END
