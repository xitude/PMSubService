<?php
Route::group(['namespace' => 'Product', 'as' => 'product.', 'prefix' => 'product'], function(){

    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/{msisdn}', 'ProductController@show')->name('show');

});