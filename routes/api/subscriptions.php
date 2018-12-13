<?php
Route::group(['middleware' => 'auth:api', 'prefix' => 'subscriptions', 'as' => 'subscription', 'namespace' => 'Subscription'], function(){

    Route::get('/', 'SubscriptionController@index')->name('index');
    Route::post('/', 'SubscriptionController@store')->name('store');

    Route::post('/destroy', 'SubscriptionController@destroy')->name('destroy');

});