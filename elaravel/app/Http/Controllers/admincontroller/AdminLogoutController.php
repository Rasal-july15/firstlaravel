<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();

class AdminLogoutController extends Controller
{
    //login to dashboard page
    public function dashboard(){
        $this->authCheck();
        return view('admin.dashboard');
    }
    //logout
    public function logoutAdmin(){
        Session::flush();
        return redirect()->to('/admin')->with('message','Successfully Logout!');
    }

    //authcheck
    public function authCheck(){
        $admin_id = Session::get('admin_id');
        if ($admin_id){
            return ;
        }else{
          return redirect()->to('/admin')->with('message','Please Login')->send();
        }
    }
}//END
