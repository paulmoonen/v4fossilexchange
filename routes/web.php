<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/',                     'HomeController@index', 'home.index');
Route::get('/home',                 'HomeController@index', 'home.named');

Route::get('/category/{id}',        'CategoryController@show', 'category.selection');

//product admin routes
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/',                       'AdminController@index',        'admin.home');
    
    Route::get('/product',                'ProductController@index',      'product.index');
    Route::get('/product/create',         'ProductController@create',     'product.create');    
    Route::post('/product/store',         'ProductController@store',      'product.save'); //logged in user role is checked in store-method
    Route::post('/product/update/{id}',   'ProductController@update',     'product.update');
    Route::get('/product/edit/{id}',      'ProductController@edit',       'product.edit');
    Route::get('/product/delete/{id}',    'ProductController@destroy',    'product.delete');
});

//order routes
Route::middleware('auth')->group(function(){
    Route::get('/order/show/{id}',              'OrderController@show',         'order.show'); //authentication check in method show
    Route::post('/order/store',                 'OrderController@store',        'order.store');        
});

//shopping cart references this route on "buy" event
//Route::get('/logged_in','UserController@isLoggedIn', 'user.logged_in');
//route referenced by shopping cart component on checkout
Route::get('/logged_in',function(){
    if(Auth::check()){
        return 1;
    }
    else{
        return 0;
    }
});

//user routes
Route::middleware('auth')->group(function(){
    Route::get('/user/{id}',                         'UserController@show',         'user.show');

});

//pictures retrieving route used by productcard Vue components
Route::get('/pictures/{id}', 'PicturesController@getPictures', 'pictures.list');

/**
 * fallback for not available or not existing routes
 */
Route::fallback( function(){
    return view('pagenotfound');
});
