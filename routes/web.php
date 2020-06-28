<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//frontend
Route::get('/','HomeController@index')->name('home');
Route::get('/trang-chu','HomeController@index');
Route::get('/sap-xep/{value}','HomeController@find')->name('fill');
Route::post('/tim-kiem','HomeController@search')->name('find');
//Profile với Auth
Route::get('/user/{id}','ProfileController@getProfile')->name('user.profile');
Route::get('/edit-user','ProfileController@edit_profile')->name('user.edit');
Route::post('/edit-user','ProfileController@update_profile')->name('user.update');
Route::get('/order-placed/{id}','ProfileController@get_order_placed');
Route::get('/view-order/{id}','ProfileController@viewOrder')->name('get.view.order');

//Maneger Users
Route::get('/thanh-vien','ManagerUserController@getUsers');
Route::get('/delete-user/{id}','ManagerUserController@delete_user');
//Manager Contact
Route::get('/lien-he-admin','ManagerContactController@get_contacts');
Route::get('/delete-contact/{id}','ManagerContactController@delete_contact');

//Auth::routers();

Route::group(['namespace'=>'Auth'],function (){
    Route::get('dang-ki','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ki','RegisterController@postRegister')->name('post.register');

    Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
    Route::get('dang-xuat','LoginController@getLogout')->name('get.logout.user');

    Route::get('/lay-lai-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
    Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendCodeResetPassword');

    Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
    Route::post('/password/reset','ForgotPasswordController@saveResetPassword');

});

//Theloai
Route::get('/the-loai/{category_id}','CateController@show_category_home');
//Chitietsanpham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@detail_product');

//backend - admin
Route::get('/admin','AdminController@index');
Route::get('/dasboard','AdminController@show_dasboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dasboard','AdminController@dasboard');

//Product admin
Route::get('/all-product','ProductController@all_product');
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/order-product','ProductController@showOrder');
Route::get('/view/{id}','ProductController@viewOrder')->name('admin.get.view.order');
Route::get('/delete-order/{id}','ProductController@delete_order');
Route::get('/active/{id}','AdminTransactionController@activeTransaction')->name('admin.get.active.transaction');


Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');


//Category
Route::get('/all-tl-product','CateController@all_tl_product');
Route::get('/add-tl-product','CateController@add_tl_product');
Route::get('/edit-tl-product/{category_id}','CateController@edit_tl_product');
Route::get('/delete-tl-product/{category_id}','CateController@delete_tl_product');
Route::post('/save-tl-product','CateController@save_tl_product');
Route::post('/update-tl-product/{category_id}','CateController@update_tl_product');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::post('/update-cart-quatity','CartController@update_cart_quatity');
Route::get('/detele-to-cart/{rowId}','CartController@delete_to_cart');

// Contact
Route::get('/lien-he','ContactController@getContact')->name('get.contact');
Route::post('/lien-he','ContactController@saveContact');
Route::get('/active-contact/{id}','ContactController@activeContact')->name('admin.get.active.contact');

//Introduction
Route::get('/gioi-thieu','IntroductionController@getIntro')->name('get.introduction');

//Dat hang thanh cong
Route::get('/dat-hang-thanh-cong','CartController@saveInfoShoppingCart');

//Checkout
Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function (){
    Route::get('/thanh-toan','CartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan','CartController@saveInfoShoppingCart');
});
