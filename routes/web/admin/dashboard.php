<?php
Route::group(['namespace' => 'Dashboard', 'as' => 'dashboard.', 'prefix' => 'dashboard'], function(){

    Route::get('/', 'DashboardController@index')->name('index');

});