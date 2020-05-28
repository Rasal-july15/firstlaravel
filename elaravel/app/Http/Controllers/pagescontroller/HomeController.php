<?php

namespace App\Http\Controllers\pagescontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Home / Start Page
    public function home(){
        $products = DB::table('tbl_product')
            ->where('product_status',1)
            ->get()->take(6);
        return view('pages.home',compact('products'));
    }
    //category_wise_product
    public function category_wise_product($category_id){
        $products = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
            ->where('tbl_category.category_id',$category_id)
            ->where('product_status',1)
            ->get();
        $product_info = view('pages.category_wise_show')->with('products',$products);
        return view('Layouts.frontendapps')->with('pages.category_wise_show',$product_info);
    }
    //brand_wise_product
    public function brand_wise_product($brand_id){
        $products = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
            ->where('tbl_brand.brand_id',$brand_id)
            ->where('product_status',1)
            ->get();
        $product_info = view('pages.brand_wise_show')->with('products',$products);
        return view('Layouts.frontendapps')->with('pages.brand_wise_show',$product_info);
    }
    //detail product
    public function detailProduct($product_id){
        $product = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
            ->where('tbl_product.product_id',$product_id)
            ->first();
        return view('pages.detail_product',compact('product'));
    }


}//END
