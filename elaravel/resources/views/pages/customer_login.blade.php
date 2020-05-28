@extends('Layouts.frontendapps')
@section('frontend_title','Customer Login')
@section('frontend_content')

<section id="form"><!--form-->
    <div class="container col-sm-12">
        <div class="row">
            <div class="col-sm-5">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    @if(session('message'))
                        <div class="alert alert-warning">{{session('message')}}</div>
                    @endif
                    <form action="{{ url('/customer-signin') }}" method="post">
                        @csrf
                        <input type="email" placeholder="Email" name="customer_email" />
                        <input type="text" placeholder="Password" name="customer_password" />
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-6">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{ url('/store-customer-signup') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Name" name="customer_name" />
                        <input type="email" placeholder="Email Address" name="customer_email" />
                        <input type="text" placeholder="Phone" name="customer_phone" />
                        <textarea name="customer_address" cols="10" rows="4" placeholder="Address"></textarea>
                        <input type="password" placeholder="Password" name="customer_password" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

@endsection