<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/','pagescontroller\HomeController@home');
Route::get('/category-wise-product/{id}','pagescontroller\HomeController@category_wise_product');
Route::get('/brand-wise-product/{id}','pagescontroller\HomeController@brand_wise_product');
Route::get('/detail-product/{id}','pagescontroller\HomeController@detailProduct');

//Cart
Route::get('/cart-page','pagescontroller\CartController@cartPage');
Route::post('/store-cart/{id}','pagescontroller\CartController@storeCart');
Route::get('/cart-delete/{rowId}','pagescontroller\CartController@deleteCart');
Route::post('/cart-update/{rowId}','pagescontroller\CartController@updateCart');

//Checkout
Route::get('/checkout-page','pagescontroller\CheckoutController@checkoutPage');
Route::get('/customer-login','pagescontroller\CheckoutController@customerLogin');
Route::post('/store-customer-signup','pagescontroller\CheckoutController@customerSignup');
Route::get('/customer-logout','pagescontroller\CheckoutController@customerLogout');
Route::post('/customer-signin','pagescontroller\CheckoutController@customerSignin');
//shipping
Route::post('/store-shipping','pagescontroller\CheckoutController@storeShipping');
Route::get('/customer-payment','pagescontroller\CheckoutController@customerPayment');
Route::post('/store-payment','pagescontroller\CheckoutController@storePayment');
Route::get('/cash','pagescontroller\CheckoutController@cash');

//Admin
Route::get('/admin','admincontroller\AdminController@login');
Route::get('/dashboard','admincontroller\AdminLogoutController@dashboard');
Route::post('/admin-login','admincontroller\AdminController@loginAdmin');
Route::get('/admin-logout','admincontroller\AdminLogoutController@logoutAdmin');

//Category
Route::get('/add-category','admincontroller\CategoryController@addCategory');
Route::get('/all-category','admincontroller\CategoryController@allCategory');
Route::post('/store-category','admincontroller\CategoryController@storeCategory');
Route::get('/inactive-category/{id}','admincontroller\CategoryController@inactiveCategory');
Route::get('/active-category/{id}','admincontroller\CategoryController@activeCategory');
Route::get('/edit-category/{id}','admincontroller\CategoryController@editCategory');
Route::post('/update-category/{id}','admincontroller\CategoryController@updateCategory');
Route::get('/delete-category/{id}','admincontroller\CategoryController@deleteCategory');


//Manage Order
Route::get('/manage-order','admincontroller\OrderController@manageOrder');
Route::get('/success-order/{id}','admincontroller\OrderController@successOrder');
Route::get('/pending-order/{id}','admincontroller\OrderController@pendingOrder');
Route::get('/delete-order/{id}','admincontroller\OrderController@deleteOrder');
Route::get('/view-order/{id}','admincontroller\OrderController@viewOrder');

//Brand
Route::get('/add-brand','admincontroller\BrandController@addBrand');
Route::get('/all-brand','admincontroller\BrandController@allBrand');
Route::post('/store-brand','admincontroller\BrandController@storeBrand');
Route::get('/inactive-brand/{id}','admincontroller\BrandController@inactiveBrand');
Route::get('/active-brand/{id}','admincontroller\BrandController@activeBrand');
Route::get('/edit-brand/{id}','admincontroller\BrandController@editBrand');
Route::post('/update-brand/{id}','admincontroller\BrandController@updateBrand');
Route::get('/delete-brand/{id}','admincontroller\BrandController@deleteBrand');

//Product
Route::get('/add-product','admincontroller\ProductController@addProduct');
Route::get('/all-product','admincontroller\ProductController@allProduct');
Route::post('/store-product','admincontroller\ProductController@storeProduct');
Route::get('/inactive-product/{id}','admincontroller\ProductController@inactiveProduct');
Route::get('/active-product/{id}','admincontroller\ProductController@activeProduct');
Route::get('/delete-product/{id}','admincontroller\ProductController@deleteProduct');
Route::get('/edit-product/{id}','admincontroller\ProductController@editProduct');
Route::post('/update-product/{id}','admincontroller\ProductController@updateProduct');

//Slider
Route::get('/add-slider','admincontroller\SliderController@addSlider');
Route::get('/all-slider','admincontroller\SliderController@allSlider');

//Icons
Route::get('/add-icon','admincontroller\IconController@addIcon');
Route::get('/all-icon','admincontroller\IconController@allIcon');

//Members
Route::get('/add-member','admincontroller\MemberController@addMember');
Route::get('/all-member','admincontroller\MemberController@allMember');