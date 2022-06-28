<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
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

Route::post('insertTab', 'App\Http\Controllers\APIController@insertTab');   // Inserting API when user open new tab
Route::post('closeTab', 'App\Http\Controllers\APIController@closeTab');     // Set Close Time for calculating duration when user close the tab.
