<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('index', function () {
        return view('index');
    });

    Route::get('product_add' , function(){
        return view('product_add');
    });

    Route::get('dashboard' , function(){
        return view('dashboard');
    });

    Route::get('maintenance_brand' , function(){
        return view('maintenance_brand');
    });

    Route::get('maintenance_category' , function(){
        return view('maintenance_category');
    });

    Route::get('maintenance_volume' , function(){
        return view('maintenance_volume');
    });

    Route::get('maintenance_nicotine' , function(){
        return view('maintenance_nicotine');
    });

    Route::get('maintenance_product' , function(){
        return view('maintenance_product');
    });

    Route::get('maintenance_position' , function(){
        return view('maintenance_position');
    });

    Route::get('maintenance_branch' , function(){
        return view('maintenance_branch');
    });

    Route::get('maintenance_users' , function(){
        return view('maintenance_users');
    });

    Route::get('transaction' , function(){
        return view('transaction');
    });

    Route::get('pointofsales' , function(){
        return view('pointofsales');
    });

    Route::get('reports' , function(){
        return view('reports');
    });

    Route::get('queries' , function(){
        return view('queries');
    });
});

Route::group(['prefix' => 'vapeorcrave/api'], function() {
    // API Version 1
    Route::group(['prefix' => 'v1'], function() {
        Route::resource('branches', 'Api\\BranchApi');
        Route::resource('brands', 'Api\\BrandApi');
        Route::resource('categories', 'Api\\CategoryApi');
        Route::resource('nicotines', 'Api\\NicotineApi');
        Route::resource('point-of-sales', 'Api\\PointOfSalesApi');
        Route::resource('positions', 'Api\\PositionApi');
        Route::resource('prices', 'Api\\PriceApi');
        Route::group(['prefix' => 'products'], function() {
            Route::get('inventories', 'Api\\ProductApi@getProductInventories');
            Route::post('{id}/inventories', 'Api\\ProductApi@storeProductInventories');
        });
        Route::resource('products', 'Api\\ProductApi');
        Route::resource('users', 'Api\\UserApi');
        Route::resource('volumes', 'Api\\VolumeApi');
    });
});