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

Route::resource('energy', 'EnergyProvidersController');


Route::get('broadband/monthly/price/{name}/{product}', 'ProviderController@show');

Route::get('energy/monthly/price/{name}/{product}/{product_variation}', 'EnergyProvidersController@show');
Route::patch('energy/monthly/price/update', 'EnergyProvidersController@update');