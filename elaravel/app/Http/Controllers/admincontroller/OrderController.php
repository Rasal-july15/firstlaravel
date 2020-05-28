<?php

namespace App\Http\Controllers\admincontroller;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //manage order
    public function manageOrder(){
        $orders = DB::table('tbl_order')
            ->join('tbl_customer_signup','tbl_order.customer_id','=','tbl_customer_signup.customer_id')
            ->get();
        $order_info = view('admin.manage_order')->with('orders',$orders);
        return view('Layouts.backendapps')->with('admin.manage_order',$order_info);
    }
    //success order
    public function successOrder($order_id){
        DB::table('tbl_order')
            ->join('tbl_customer_signup','tbl_order.customer_id','=','tbl_customer_signup.customer_id')
            ->where('order_id',$order_id)
            ->update(['order_status'=>"delivered"]);
        return redirect()->back();
    }
    //success order
    public function pendingOrder($order_id){
        DB::table('tbl_order')
            ->join('tbl_customer_signup','tbl_order.customer_id','=','tbl_customer_signup.customer_id')
            ->where('order_id',$order_id)
            ->update(['order_status'=>"pending"]);
        return redirect()->back();
    }
    //success order
    public function deleteOrder($order_id){
        DB::table('tbl_order')
            ->join('tbl_customer_signup','tbl_order.customer_id','=','tbl_customer_signup.customer_id')
            ->where('order_id',$order_id)
            ->delete();
        return redirect()->back()->with('message','Order Deleted Successfully!');
    }
    //view order
    public function viewOrder($order_id){
        $orders_info = DB::table('tbl_order')
            ->join('tbl_customer_signup','tbl_order.customer_id','=','tbl_customer_signup.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
            ->where('tbl_order.order_id',$order_id)
            ->get();
        return view('admin.view_order',compact('orders_info'));
    }
}//END
