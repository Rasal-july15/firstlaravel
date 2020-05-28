<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();
class CategoryController extends Controller
{
    //add category
    public function addCategory(){
        $this->authCheck();
        return view('admin.add_category');
    }
    //all category
    public function allCategory(){
        $this->authCheck();
        $categories = DB::table('tbl_category')->get();
        return view('admin.all_category',compact('categories'));
    }
    //store category
    public function storeCategory(Request $request){
        $this->validate($request,[
           'category_name' => 'required|min: 4|max: 50'
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category')->insert($data);

        return redirect()->back()->with('message','Category Inserted!');
    }
    //inactive
    public function inactiveCategory($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
        return redirect()->back();
    }
    //active
    public function activeCategory($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
        return redirect()->back();
    }
    //edit
    public function editCategory($category_id){
        $this->authCheck();
        $category = DB::table('tbl_category')->where('category_id',$category_id)->first();
        return view('admin.edit_category',compact('category'));
    }
    //update
    public function updateCategory(Request $request, $category_id){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_status'] = $request->category_status;
        DB::table('tbl_category')->where('category_id',$category_id)->update($data);
        return redirect()->to('/all-category')->with('message','Data Updated!');
    }
    //delete
    public function deleteCategory($category_id){
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        return redirect()->back()->with('message','Data Deleted!');
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
