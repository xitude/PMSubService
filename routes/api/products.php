<?php
Route::group(['middleware' => 'auth:api', 'prefix' => 'products', 'as' => 'product', 'namespace' => 'Product'], function(){

    Route::get('/', 'ProductController@index')->name('index');

    Route::group(['prefix' => '/{product_id}'], function(){
        Route::get('/', 'ProductController@show')->name('show');
    });

});