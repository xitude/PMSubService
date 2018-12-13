<?php
Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin'], function(){

    include_once 'dashboard.php';
    include_once 'subscriptions.php';
    include_once 'products.php';

});