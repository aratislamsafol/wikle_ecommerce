<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/','User\UserController@Index');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ============================= Multiple Authentication ======================================

Route::group(['prefix'=>'admin' ,'middleware'=>['admin','auth'] , 'namespace'=>'admin'],function(){
    Route::get('dashboard','AdminController@Index')->name('admin.dashboard');
});

Route::group(['prefix'=>'user' ,'middleware'=>['user','auth'] , 'namespace'=>'user'],function(){
    Route::get('dashboard','UserController@Index')->name('user.dashboard');
});
Route::get('logout','Admin\AdminController@Logout')->name('logout');
Route::get('logout','User\UserController@Logout')->name('logout');

// BACKEND (ADMIN PANEL)

// ============================= Category ======================================
Route::get('ajax-crud-datatable', 'Admin\CategoryController@index');
Route::post('store-company', 'Admin\CategoryController@store');
Route::post('edit-company', 'Admin\CategoryController@edit');
Route::post('delete-company', 'Admin\CategoryController@destroy');
Route::get('view-cat', 'Admin\CategoryController@view');

//==============================Brand==========================================
Route::resource('tours','Admin\BrandController');
Route::get('brand/index','Admin\BrandController@index');
Route::get('brand/all','Admin\BrandController@getall')->name('getall.tour');

//==============================Role==========================================
Route::get('role/index','Admin\RoleController@index');

//==============================Product==========================================
Route::resource('products','Admin\ProdcutController');
Route::get('product/all','Admin\ProdcutController@getall')->name('getall.product');

//==============================Coupon==========================================
Route::resource('coupons','Admin\CouponController');
Route::get('coupon/all','Admin\CouponController@getall')->name('getall.coupon');
// Route::get('coupon/active','Admin\CouponController@active')->name('active.coupon');
Route::post('edit-coupon', 'Admin\CouponController@active');
Route::post('store-company', 'Admin\CouponController@store_active');


// ================================================== Fontend =================================================
// User Controller  ---> category
Route::get('category/page','User\UserController@CategoryPage')->name('category.page');

// User Controller  ---> Product
Route::group(['prefix'=>'product'],function(){
    Route::get('item/details/{id}','User\UserController@SinglePage');
});

// User Controller  ---> Cart
Route::group(['prefix'=>'cart'],function(){
    Route::get('item/details','User\CartController@index')->name('cart.page');
    Route::post('add/item/{id}','User\CartController@AddCart');
    Route::get('destroy/{id}','User\CartController@Remove');
    Route::post('quantity/update/{id}','User\CartController@UpdateCart');
    // Route::get('item/details/{id}','User\CartController@RelatedProduct');

});





