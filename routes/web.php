
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'],function()
{
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restos', 'RestaurantController@index')->name('restos');
Route::get('/restos/menu/{id}', 'MenuController@index')->name('restos.menu');
Route::get('/restos/order/{id}', 'RestoOrderController@index')->name('resto.orders');
Route::get('/restos/order/{id}/add', 'RestoOrderController@add')->name('orders.add');


});
