@extends('Layouts.frontendapps')
@section('frontend_title','Checkout Products')
@section('frontend_content')

    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="register-req">
                <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-10 clearfix">
                        <div class="bill-to">
                            <p>Shipping To</p>
                            <div class="form-one">
                                <form action="{{ url('/store-shipping') }}" method="post">
                                    @csrf
                                    <input type="text" placeholder="Name" name="shipping_name">
                                    <input type="text" placeholder="Email" name="shipping_email">
                                    <input type="text" placeholder="Phone Number" name="shipping_phone">
                                    <input type="text" placeholder="Referrence Phone Number" name="shipping_ref_phone">
                                    <input type="text" placeholder="Address" name="shipping_address">
                                    <input type="submit" value="Submit" class="btn alert-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->



@endsection