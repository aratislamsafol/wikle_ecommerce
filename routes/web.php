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
// 'middleware'=>['admin','auth'] ,
Route::group(['prefix'=>'admin' , 'namespace'=>'admin'],function(){
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
    Route::post('quantitydfs/update/{id}','User\CartController@UpdateCart')->name('carts.update');
    // Route::post('add/item/cart/single/{id}','User\CartController@AddCartSinglePage');
    // Route::get('item/details/{id}','User\CartController@RelatedProduct');

});

// // Cart Routes
// Route::group(['prefix' => 'carts'], function(){
//     Route::get('/', 'Frontend\CartsController@index')->name('carts');
//     Route::post('/store', 'Frontend\CartsController@store')->name('carts.store');
//     Route::post('/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
//     Route::post('/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');
//   });


// ============================= Division ======================================
Route::get('division_datatable', 'Admin\DivisionController@index');
Route::post('store-division', 'Admin\DivisionController@store');
Route::post('edit-division', 'Admin\DivisionController@edit');
Route::post('delete-division', 'Admin\DivisionController@destroy');
Route::get('view-division', 'Admin\DivisionController@view');

// ============================= Distric ======================================
Route::get('district_datatable', 'Admin\DistricController@index');
Route::post('store-distric', 'Admin\DistricController@store');
Route::post('edit-distric', 'Admin\DistricController@edit');
Route::post('delete-district', 'Admin\DistricController@destroy');
Route::get('view-distric', 'Admin\DistricController@view');


// API routes
Route::get('get-districts/{id}', function($id){
    return json_encode(App\District::where('division_id', $id)->get());
});

// Coupon Apply
Route::get('coupon/name','User\CouponController@ApplyCoupon')->name('coupon.add');
Route::get('coupon/destroy','User\CouponController@CouponDestroy')->name('coupon.destroy');

// WishList
Route::group(['prefix'=>'wishlist'],function(){
    Route::get('index','User\WishlistController@index')->name('wishlist.index');
    Route::get('add/{id}','User\WishlistController@AddWishlist')->name('add.wishlist');
    Route::get('remove/wishlist/{id}','User\WishlistController@Remove')->name('remove.wishlist');
    Route::get('demos/searchLive','User\WishlistController@searchLive');
});

// Shop Page
Route::group(['prefix'=>'shop'],function(){
    Route::get('product/show','User\UserController@ShowAllProductsss')->name('shop.product');
});

//Checkout
Route::get('checkout','User\CheckoutController@Index')->name('checkout.page');
Route::post('checkout/place_order','OrderController@StoreOrder')->name('checkout_payment');



