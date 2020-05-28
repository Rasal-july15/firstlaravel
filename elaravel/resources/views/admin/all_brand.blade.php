@extends('Layouts.backendapps')
@section('backend_title','All Brand')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Brand</a></li>
    </ul>
@if(session('message'))
    <div class="alert alert-info">{{session('message')}}</div>
@endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Brand</h2>
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
                        <th>Brand Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->brand_id }}</td>
                        <td class="center">{{ $brand->brand_name }}</td>
                        <td class="center">
                            @if($brand->brand_status==1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-info">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($brand->brand_status==1)
                                <a class="btn btn-success" href="{{ URL::to('inactive-brand',[$brand->brand_id]) }}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                             @else
                                <a class="btn btn-info" href="{{ URL::to('active-brand',[$brand->brand_id]) }}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @endif
                            <a class="btn btn-info" href="{{ URL::to('edit-brand',[$brand->brand_id]) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a id="delete" class="btn btn-danger" href="{{ URL::to('/delete-brand',[$brand->brand_id]) }}">
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
