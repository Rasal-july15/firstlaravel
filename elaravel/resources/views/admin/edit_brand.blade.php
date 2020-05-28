@extends('Layouts.backendapps')
@section('backend_title','Edit Brand')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Edit Brand</a>
        </li>
    </ul>
    @if(session('message'))
        <div class="alert alert-info">{{session('message')}}</div>
    @endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="{{ url('update-brand',[$brand->brand_id]) }}" method="post" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="brand_name">Brand Name</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" value="{{ $brand->brand_name }}" id="brand_name" type="text" name="brand_name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="brand_status">Status</label>
                            <div class="controls">
                                <select id="brand_status" name="brand_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->



@endsection    
