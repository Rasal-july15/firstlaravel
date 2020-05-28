<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    //login page
    public function login(){
        return view('admin.login');
    }
    //Admin login
    public function loginAdmin(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();
        if ($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return redirect()->to('/dashboard');
        }
        return redirect()->back()->with('message','Invalid Email or Password');
    }
}
