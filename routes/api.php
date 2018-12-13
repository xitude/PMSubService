<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'namespace' => 'API'], function(){
    include_once 'api/subscriptions.php';
    include_once 'api/products.php';
});

/*JsonApi::register('default', ['namespace' => 'Api'], function ($api, $router) {
    $api->resource('subscriptions');
});
*/
