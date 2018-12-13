<?php
Route::group(['namespace' => 'Subscription', 'as' => 'subscription.', 'prefix' => 'subscription'], function(){

    Route::get('/', 'SubscriptionController@index')->name('index');
    Route::post('/truncate', 'SubscriptionController@truncate')->name('truncate');
    Route::get('/{msisdn}', 'SubscriptionController@show')->name('show');

});