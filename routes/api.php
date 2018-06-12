<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API rout|es for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('cors')->group(function (){
    Route::get('material','Api\MaterialController@index');
});
Route::middleware('cors')->group(function (){
    Route::get('language','Api\LanguageController@index');
});
Route::middleware('cors')->group(function (){
    Route::get('materialtype','Api\MaterialTypeController@index');
});