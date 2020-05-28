<?php

namespace App\Http\Controllers\pagescontroller;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //checkout page
    public function checkoutPage(){
        $this->loginCheck();
        return view('pages.checkout');
    }
    //Customer Login
    public function customerLogin(){
        return view('pages.customer_login');
    }
    //customer sign in
    public function customerSignin(Request $request){
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        $result = DB::table('tbl_customer_signup')
            ->where('customer_email',$customer_email)
            ->where('customer_password',$customer_password)
            ->first();
        if ($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return redirect()->to('/checkout-page');
        }
        return redirect()->back()->with('message','Invalid Email or Password');
    }
    //Customer Logout
    public function customerLogout(){
        Session::flush();
        return redirect()->to('/');
    }
    //customer signup
    public function customerSignup(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_address'] = $request->customer_address;
        $data['customer_password'] = $request->customer_password;
        $customer_id = DB::table('tbl_customer_signup')->insertGetId($data);
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);
        return redirect()->to('/checkout-page');
    }

    //customer payment
    public function customerPayment(){
        $this->loginCheck();
        return view('pages.customer_payment');
    }

    //store shipping
    public function storeShipping(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_ref_phone'] = $request->shipping_ref_phone;
        $data['shipping_address'] = $request->shipping_address;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
        return redirect()->to('/customer-payment');
    }

    //cash page
    public function cash(){
        $this->loginCheck();
        return view('pages.cash');
    }

    //store payment
    public function storePayment(Request $request){
        $payment_method = $request->payment_method;
        $data = array();
        $data['payment_method'] = $payment_method;
        $data['payment_status'] = $request->payment_status;
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //data insert into order table
        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
//        extra
        $odata['order_subtotal'] = Cart::subtotal();
        $odata['order_tax'] = Cart::tax();
//end extra
        $odata['order_total'] = Cart::total();
        $odata['order_status'] = 'pending';
        $order_id = DB::table('tbl_order')->insertGetId($odata);

        //data insert into Order details table
        $contents = Cart::content();
        $oddata = array();
        foreach ($contents as $content){
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $content->id;
            $oddata['product_name'] = $content->name;
            $oddata['product_price'] = $content->price;
            $oddata['product_sales_quantity'] = $content->qty;
            DB::table('tbl_order_details')->insert($oddata);
        }//endforeach

        if ($payment_method=='cash'){
            Cart::destroy();
            return redirect()->to('/cash');
        }
        elseif ($payment_method=='bank_transfer'){
            Cart::destroy();
            return redirect()->to('/cash');
        }
        elseif ($payment_method=='bkash'){
            Cart::destroy();
            return redirect()->to('/cash');
        }
        elseif ($payment_method=='paypal'){
            Cart::destroy();
            return redirect()->to('/cash');
        }
        else{
            return redirect()->back()->with('message','Please Select any one Pay Method!');
        }//endif

    }


    //login check
    public function loginCheck(){
        $customer_id = Session::get('customer_id');
        if ($customer_id){
            return;
        }
        return redirect()->to('customer-login')->send();
    }
}//END
