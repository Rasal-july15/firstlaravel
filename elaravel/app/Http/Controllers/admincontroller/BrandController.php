<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();
class BrandController extends Controller
{
    //add brand
    public function addBrand(){
        $this->authCheck();
        return view('admin.add_brand');
    }
    //all brand
    public function allBrand(){
        $this->authCheck();
        $brands = DB::table('tbl_brand')->get();
        $brand_info = view('admin.all_brand')->with('brands',$brands);
        return view('Layouts.backendapps')->with('admin.all_brand',$brand_info);

//        return view('admin.all_brand');
    }
    //store brand
    public function storeBrand(Request $request){
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand')->insert($data);

        return redirect()->back()->with('message','Brand Inserted!');
    }
    //inactive
    public function inactiveBrand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        return redirect()->back();
    }
    //active
    public function activeBrand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        return redirect()->back();
    }
    //Edit
    public function editBrand($brand_id){
        $this->authCheck();
        $brand = DB::table('tbl_brand')->where('brand_id',$brand_id)->first();
        return view('admin.edit_brand',compact('brand'));
    }
    //Update brand
    public  function updateBrand(Request $request, $brand_id){
        $data = array();
        $data['brand_name'] = $request->brand_name;
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
        return redirect()->to('/all-brand')->with('message','Updated Data!');
    }
    //delete brand
    public function deleteBrand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        return redirect()->back()->with('message','Data Deleted!!');
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
