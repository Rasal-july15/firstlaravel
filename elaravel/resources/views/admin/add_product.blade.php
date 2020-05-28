@extends('Layouts.backendapps')
@section('backend_title','Add Product')
@section('backend_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Product</a>
        </li>
    </ul>
@if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
@endif
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="{{ url('/store-product') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="product_name">Product Name</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" id="product_name" type="text" name="product_name">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_id">Category Name</label>
                            <div class="controls">
                                <?php
                                    $categories = DB::table('tbl_category')->where('category_status',1)->get();
                                ?>
                                <select id="category_id" name="category_id">
                                    <option>--Select Category--</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="brand_id">Brand Name</label>
                            <div class="controls">
                                <?php
                                $brands = DB::table('tbl_brand')->where('brand_status',1)->get();
                                ?>
                                <select id="brand_id" name="brand_id">
                                    <option>--Select Brand--</option>
                                    @foreach($brands as $brand)
                                    <option value={{ $brand->brand_id }}>{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="product_short_description">Product Short Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="product_short_description" name="product_short_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="product_long_description">Product Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" id="product_long_description" name="product_long_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_color">Product Color</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" id="product_color" type="text" name="product_color">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_size">Product Size</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" id="product_size" type="text" name="product_size">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_weight">Product Weight</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" id="product_weight" type="text" name="product_weight">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_price">Product Price</label>
                            <div class="controls">
                                <input class="input-xlarge disabled" id="product_price" type="text" name="product_price">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_stock">Product Stock</label>
                            <div class="controls">
                                <select id="product_stock" name="product_stock">
                                    <option value="available">Available</option>
                                    <option value="in_stock">In Stock</option>
                                    <option value="out_of_stock">Out of Stock</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_image">Product Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="product_image" name="product_image" type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="product_status">Status</label>
                            <div class="controls">
                                <select id="product_status" name="product_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->



@endsection    
