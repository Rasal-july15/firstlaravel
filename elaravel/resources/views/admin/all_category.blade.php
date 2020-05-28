@extends('Layouts.backendapps')
@section('backend_title','All Category')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Category</a></li>
    </ul>
@if(session('message'))
    <div class="alert alert-info">{{session('message')}}</div>
@endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($categories as $category){
                    ?>
                    <tr>
                        <td>{{ $category->category_id }}</td>
                        <td class="center">{{ $category->category_name }}</td>
                        <td class="center">
                            <?php
                                if ( $category->category_status==1 ){?>
                                    <span class="label label-success">Active</span>
                          <?php }else{ ?>
                                    <span class="label label-info">Inactive</span>
                            <?php } ?>
                        </td>
                        <td class="center">
                            <?php
                                if ($category->category_status==1){?>
                                    <a class="btn btn-success" href="{{ URL::to('/inactive-category',[$category->category_id]) }}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                         <?php  }else{ ?>
                                    <a class="btn btn-info" href="{{ URL::to('/active-category',[$category->category_id]) }}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                        <?php } ?>
                            <a class="btn btn-info" href="{{ URL::to('/edit-category',[$category->category_id]) }}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a id="delete" class="btn btn-danger" href="{{ URL::to('/delete-category',[$category->category_id]) }}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php    } ?>
                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->



@endsection
