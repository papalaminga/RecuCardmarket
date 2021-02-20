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

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::post('registerCarta', 'App\Http\Controllers\CardController@crearCarta');
    Route::post('crearColeccion', 'App\Http\Controllers\ColectionController@CrearColeccion');
    Route::post('CrearVenta', 'App\Http\Controllers\SellController@CrearVenta');
    Route::get('Buscar/{id}', 'App\Http\Controllers\SellController@BuscarCarta');


});


Route::get('VerVentas', 'App\Http\Controllers\SellController@VerVentas');

Route::get('BuscarCartas/{id}', 'App\Http\Controllers\CardController@BuscarCartas');

Route::post('password/email', 'App\Http\Controllers\UserController@forgot');
Route::post('password/reset', 'App\Http\Controllers\UserController@reset');
    



//Route::get('verCartas', 'App\Http\Controllers\CardController@verCartas');