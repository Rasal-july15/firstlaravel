@extends('Layouts.backendapps')
@section('backend_title','Order Details')
@section('backend_content')
    <style>
          .view-div{
              float: left;
              margin-right: 30px;
              margin-bottom: 100px;
          }
        .view-div-field{
            width: 150px;
            font-size: 15px;
        }
    </style>

{{--Customer/User Info--}}
    <div class="view-div">
        <table class="table table-striped table-bordered">
            <caption><h2>Customer Information</h2></caption>
            <thead>
            <tr>
                <th class="view-div-field">Customer Name</th>
                <th class="view-div-field">Contact</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders_info as $order)
            @endforeach
            <tr>
                <td class="view-div-field">{{ $order->customer_name }}</td>
                <td class="view-div-field">{{ $order->customer_phone }}</td>
            </tr>
            </tbody>
        </table>
    </div>

{{--Shipping Person Info--}}
    <div class="view-div">
        <table class="table table-striped table-bordered">
            <caption><h2>Shipping Information</h2></caption>
            <thead>
            <tr>
                <th class="view-div-field">Shipping Name</th>
                <th class="view-div-field">Email</th>
                <th class="view-div-field">Contact</th>
                <th class="view-div-field">Address</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="view-div-field">{{ $order->shipping_name }}</td>
                <td class="view-div-field">{{ $order->shipping_email }}</td>
                <td class="view-div-field">{{ $order->shipping_phone }}</td>
                <td class="view-div-field">{{ $order->shipping_address }}</td>
            </tr>
            </tbody>
        </table>
    </div>

{{--Order details--}}
    <div class="view-div">
        <table class="table table-striped table-bordered">
            <caption><h2>Order Information</h2></caption>
            <thead>
            <tr>
                <th class="view-div-field">Product ID</th>
                <th class="view-div-field">Product Name</th>
                <th class="view-div-field">Unique Price</th>
                <th class="view-div-field">Quantity</th>
                <th class="view-div-field">Sub Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders_info as $orders)
            <tr>
                <td class="view-div-field">{{ $orders->product_id }}</td>
                <td class="view-div-field">{{ $orders->product_name }}</td>
                <td class="view-div-field">{{ $orders->product_price }}</td>
                <td class="view-div-field">{{ $orders->product_sales_quantity }}</td>
                <td class="view-div-field">{{ $orders->product_price*$orders->product_sales_quantity }}</td>
            </tr>
            @endforeach
            <tr>
                <td class="view-div-field" colspan="4" style="text-align: right"><strong>Sub-total</strong></td>
                <td class="view-div-field" colspan="4"><strong>{{ $orders->order_subtotal }}</strong></td>
            </tr>
            <tr>
                <td class="view-div-field" colspan="4" style="text-align: right"><strong>Vat</strong></td>
                <td class="view-div-field" colspan="4"><strong>{{ $orders->order_tax }}</strong></td>
            </tr>
            <tr>
                <td class="view-div-field" colspan="4" style="text-align: right"><strong>Total</strong></td>
                <td class="view-div-field" colspan="4"><strong>{{ $orders->order_total }}</strong></td>
            </tr>
            </tbody>
        </table>
    </div>


@endsection