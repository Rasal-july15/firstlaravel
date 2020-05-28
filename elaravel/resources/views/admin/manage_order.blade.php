@extends('Layouts.backendapps')
@section('backend_title','Manage Order')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{ URL::to('/manage-order') }}">Manage Order</a></li>
    </ul>
    @if(session('message'))
        <div class="alert alert-info">{{session('message')}}</div>
    @endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td class="center">{{ $order->customer_name }}</td>
                            <td class="center">{{ $order->order_total }}</td>
                            <td class="center">
                                @if($order->order_status=="delivered")
                                    <span class="label label-success">Delivered</span>
                                @else
                                    <span class="label label-info">Pending</span>
                                @endif
                            </td>
                            <td class="center">
                          {{--Status--}}
                                @if($order->order_status=="delivered")
                                    <a class="btn btn-success" href="{{ URL::to('/pending-order',[$order->order_id]) }}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @else
                                    <a class="btn btn-info" href="{{ URL::to('/success-order',[$order->order_id]) }}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @endif
                          {{--Edit--}}
                                <a class="btn btn-info" href="{{ URL::to('view-order',[$order->order_id]) }}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                          {{--Delete--}}
                                <a id="delete" class="btn btn-danger" href="{{ URL::to('delete-order',[$order->order_id]) }}">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->



@endsection
