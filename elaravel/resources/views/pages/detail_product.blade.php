@extends('Layouts.frontendapps')
@section('frontend_title','Product Details')
@section('frontend_content')

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ URL::to($product->product_image) }}" alt="" />
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2>{{ $product->product_name }}</h2>
                {{--<p>Web ID: 1089772</p>--}}
                {{--<img src="{{ URL::to('frontend/images/product-details/rating.png') }}" alt="" />--}}
                <span>
									<span>TK {{ $product->product_price }}</span>
                                <form action="{{ url('/store-cart',[$product->product_id]) }}" method="post">
                                    @csrf
									<label>Quantity:</label>
									<input type="text" name="qty" value="1" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                                </form>
								</span>
                <p><b>Availability:</b> {{ $product->product_stock }}</p>
                {{--<p><b>Condition:</b> New</p>--}}
                <p><b>Brand:</b> {{ $product->brand_name }}</p>
                <p><b>Category:</b> {{ $product->category_name }}</p>
                <p><b>Size:</b> {{ $product->product_size }}</p>
                <p><b>Color:</b> {{ $product->product_color }}</p>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-10">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <h2>Product Name :  {{ $product->product_name }}</h2>
                                <p>Product Size :  {{ $product->product_size }}</p>
                                <p>Product Color :  {{ $product->product_color }}</p>
                                <p>Availability :  {{ $product->product_stock }}</p>
                                <p>Category :  {{ $product->category_name }}</p>
                                <p>Brand :  {{ $product->brand_name }}</p>
                                <p>Price :  {{ $product->product_price }} Tk.</p>
                                <p>Description :  {{ $product->product_long_description }}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-10">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <h2>Brand : {{ $product->brand_name }}</h2>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!--/category-tab-->


@endsection