<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

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





