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
Route::middleware('cors')->group(function (){
    Route::get('material','Api\MaterialController@index');
});
Route::middleware('cors')->group(function (){
    Route::get('user','Api\UserController@index');
});
Route::middleware('cors')->group(function (){
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
});
Route::middleware('cors')->group(function (){
    Route::get('materials_views','Api\MaterialController@topViews');
});
Route::middleware('cors')->group(function (){
    Route::get('areas_views','Api\MaterialController@topAreas');
});
Route::middleware('cors')->group(function (){
    Route::get('materialTypes_views','Api\MaterialController@topMaterialTypes');
});
Route::middleware('cors')->group(function (){
    Route::get('mediaViews','Api\MaterialController@topMediaViews');
});