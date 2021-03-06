<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('item/save','MenuController@saveMenuItem');

Route::group(['middleware' => ['auth:api']],function(){
Route::post('/resto','RestaurantController@store');
Route::post('/resto/menu','MenuController@getRestaurantMenu');
Route::post('/order/save','RestoOrderController@store');
Route::post('/order/complete','RestoOrderController@complete');
Route::post('/order/remove','RestoOrderController@remove');


});
