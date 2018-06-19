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
Route::middleware('cors')->group(function(){
    Route::get('materials','Api\MaterialController@index'); 
});
Route::middleware('cors')->group(function(){
    Route::get('languages','Api\LanguageController@index');
});
Route::middleware('cors')->group(function(){
    Route::get('materialTypes','Api\MaterialTypeController@index');
});
Route::middleware('cors')->group(function(){
    Route::get('users','Api\UserController@index');
});
Route::middleware('cors')->group(function(){
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
});
Route::middleware('cors')->group(function(){
    Route::get('languages_material','Api\MaterialController@getLanguage');
});
Route::middleware('cors')->group(function(){
    Route::get('users_material','Api\UserController@getRead');
});