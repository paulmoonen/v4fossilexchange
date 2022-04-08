<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

//two versions of the same route: Auth facade redirects to '/home'
//and so should an empty url bar do
Route::get('/',                     'HomeController@index', 'home.index');
Route::get('/home',                 'HomeController@index', 'home.named'); 

//see all products in a specific category
Route::get('/category/{id}',        'CategoryController@show', 'category.selection');

//admin routes
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/',                       'AdminController@index',        'admin.home');
    
    Route::get('/product',                'ProductController@index',      'product.index');
    Route::get('/product/create',         'ProductController@create',     'product.create');    
    Route::post('/product/store',         'ProductController@store',      'product.save'); //user role is checked in store-method
    Route::post('/product/update/{id}',   'ProductController@update',     'product.update');
    Route::get('/product/edit/{id}',      'ProductController@edit',       'product.edit');
    Route::get('/product/delete/{id}',    'ProductController@destroy',    'product.delete');

    Route::get('/picture/create',          'PictureController@create',     'picture.create');
    Route::post('/picture/store',          'PictureController@store',      'picture.store');
});

//order routes
Route::middleware('auth')->group(function(){
    Route::get('/order/show/{id}',              'OrderController@show',         'order.show'); //authentication check in method show
    Route::post('/order/store',                 'OrderController@store',        'order.store');        
});

//user routes
Route::middleware('auth')->group(function(){
    Route::get('/user/{id}',                         'UserController@show',         'user.show');
});

//pictures retrieving route used by productcard Vue components
Route::get('/pictures/{id}', 'PictureController@getPictures', 'pictures.list');

//shopping cart
Route::post('/cart/add/{id}',   'ShoppingCartController@update',    'cart.add');    //adds 1 item to cart
Route::get('/cart/edit',        'ShoppingCartController@create',    'cart.edit');   //returns a form with prefilled, editable data 
Route::post('/cart/clear',      'ShoppingCartController@emptycart', 'cart.empty');
Route::post('/cart/store',      'ShoppingCartController@store',     'cart.store');  //receives customer-updated version of cart data 
Route::get('/cart',             'OrderController@create', 'order.new');             //view cart an address details, checkout link

/**
 * fallback for not available or not existing routes
 */
Route::fallback( function(){
    return view('pagenotfound');
});
