@extends('Layouts.backendapps')
@section('backend_title','Edit Category')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Edit Category</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            @if(session('message'))
                <div class="alert alert-info">{{session('message')}}</div>
            @endif
            <div class="box-content">
                <form action="{{ url('/update-category',[$category->category_id]) }}" method="post" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Category Name</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" value="{{ $category->category_name }}" id="category_name" type="text" name="category_name">
                            </div>
                        </div>
                        @if($errors->has('category_name'))
                            <p class="alert alert-danger">{{$errors->first('category_name')}}</p>
                        @endif
                        <div class="control-group">
                            <label class="control-label" for="category_status">Status</label>
                            <div class="controls">
                                <select id="category_status" name="category_status">
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
