<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
session_start();
class ProductController extends Controller
{
    //add product
    public function addProduct(){
        $this->authCheck();
        return view('admin.add_product');
    }
    //all product
    public function allproduct(){
        $this->authCheck();
        $products = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
            ->get();
        $product_info = view('admin.all_product')->with('products',$products);
        return view('Layouts.backendapps')->with('admin.all_product',$product_info);

//        return view('admin.all_product');
    }
    //store
    public function storeProduct(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_color'] = $request->product_color;
        $data['product_size'] = $request->product_size;
        $data['product_weight'] = $request->product_weight;
        $data['product_price'] = $request->product_price;
        $data['product_stock'] = $request->product_stock;
        $data['product_status'] = $request->product_status;
        $image = $request->file('product_image');
        if ($image){
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name = Str::random(10).".".$ext;
            $image_path = "Images/";
            $image_url = $image_path.$image_name;
            $success = $image->move($image_path,$image_name);
                if ($success){
                    $data['product_image'] = $image_url;
                    DB::table('tbl_product')->insert($data);
                    return redirect()->back()->with('message','Product Stored!');
                }
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        return redirect()->back()->with('message','Product Stored Without Image!');
    }
    //inactive
    public function inactiveProduct($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return redirect()->back();
    }
    //active
    public function activeProduct($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return redirect()->back();
    }
    //active
    public function deleteProduct($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        return redirect()->back()->with('message','Product Deleted!');
    }
    //edit
    public function editProduct($product_id){
        $this->authCheck();
        $product = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
            ->where('tbl_product.product_id',$product_id)
            ->first();
        return view('admin.edit_product',compact('product'));
    }
    //update
    public function updateProduct(Request $request, $product_id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_color'] = $request->product_color;
        $data['product_size'] = $request->product_size;
        $data['product_weight'] = $request->product_weight;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;
        $image = $request->file('product_image');
        if ($image){
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name = Str::random(10).".".$ext;
            $image_path = "Images/";
            $image_url = $image_path.$image_name;
            $success = $image->move($image_path,$image_name);
            if ($success){
                $data['product_image'] = $image_url;
                DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                return redirect()->to('/all-product')->with('message','Product Updated!');
            }
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        return redirect()->to('/all-product')->with('message','Product Updated Without Image!');
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
