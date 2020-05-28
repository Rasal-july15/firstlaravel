@extends('Layouts.frontendapps')
@section('frontend_title','Customer Payment')
@section('frontend_content')

    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <?php $contents = Cart::content(); ?>

            <div class="table-responsive cart_info col-sm-12">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Weight</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ URL::to($content->options->image) }}" width="60px" alt="photo"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $content->name }}</a></h4>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $content->weight }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{ $content->price }} Tk</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{--<a class="cart_quantity_up" href=""> + </a>--}}
                                    <form action="{{ url('cart-update',[$content->rowId]) }}" method="post">
                                        @csrf
                                        <input class="cart_quantity_input" type="number" name="qty" value="{{ $content->qty }}">
                                        &nbsp;
                                        <input class="btn btn-default" type="submit" value="Update">
                                    </form>
                                    {{--<a class="cart_quantity_down" href=""> - </a>--}}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ $content->total }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ URL::to('/cart-delete',[$content->rowId]) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
                            <li>Eco Tax <span>{{ Cart::tax() }}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{ Cart::total() }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

    <div class="payment-options">
        <h2>Select Payment Mode</h2>
        @if(session('message'))
            <div class="alert alert-warning">{{session('message')}}</div>
        @endif
        <form action="{{ url('/store-payment') }}" method="post">
            @csrf
                <label><input type="radio" name="payment_method" value="bank_transfer" required> Direct Bank Transfer </label>
            <br>
                <label><input type="radio" name="payment_method" value="bkash" required> bKash </label>
            <br>
                <label><input type="radio" name="payment_method" value="paypal" required> Paypal </label>
            <br>
                <label><input type="radio" name="payment_method" value="cash" required> Cash </label>
            <br>
            <select name="payment_status" hidden>
                <option value="0">pending</option>
                <option value="1">Paid</option>
            </select>
            <br>
                <input type="submit" class="btn btn-success" value="Done">
        </form>
    </div>




@endsection