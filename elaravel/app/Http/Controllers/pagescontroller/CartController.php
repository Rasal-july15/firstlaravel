<?php

namespace App\Http\Controllers\pagescontroller;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //cart page
    public function cartPage(){
        return view('pages.cart_page');
    }
    //store cart
    public function storeCart(Request $request, $product_id){
        $customer_id = Session::get('customer_id');
        $shipping_id = Session::get('shipping_id');

        $qty = $request->qty;
        $product = DB::table('tbl_product')->where('product_id',$product_id)->first();

        $data = array();
        $data['id'] = $product->product_id;
        $data['name'] = $product->product_name;
        $data['qty'] = $qty;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_weight;
        $data['options']['image'] = $product->product_image;
        Cart::add($data);
        if($customer_id !=NULL && $shipping_id!=NULL){
            return redirect()->to('/customer-payment');
        }
        return redirect()->to('/cart-page');
    }
    //cart delete
    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }
    //cart update
    public function updateCart(Request $request, $rowId){
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }
}
