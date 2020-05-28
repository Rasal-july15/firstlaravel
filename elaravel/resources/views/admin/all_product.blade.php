@extends('Layouts.backendapps')
@section('backend_title','All Product')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Product</a></li>
    </ul>
@if(session('message'))
    <div class="alert alert-info">{{session('message')}}</div>
@endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Photo</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td class="center">{{ $product->product_name }}</td>
                        <td class="center">{{ $product->category_name}}</td>
                        <td class="center">{{ $product->brand_name}}</td>
                        <td class="center"><img src="{{ $product->product_image}}" width="50" alt="photo"></td>
                        <td class="center">{{ $product->product_color }}</td>
                        <td class="center">{{ $product->product_size }}</td>
                        <td class="center">{{ $product->product_price }}</td>
                        <td class="center">{{ $product->product_stock}}</td>
                        <td class="center">
                            @if($product->product_status==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-info">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($product->product_status==1)
                                <a class="btn btn-success" href="{{ URL::to('/inactive-product',[$product->product_id]) }}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            @else
                                <a class="btn btn-info" href="{{ URL::to('/active-product',[$product->product_id]) }}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @endif
                            <a class="btn btn-info" href="{{ URL::to('/edit-product',[$product->product_id]) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a id="delete" class="btn btn-danger" href="{{ URL::to('/delete-product',[$product->product_id]) }}">
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
