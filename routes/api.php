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
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialTypes','Api\MaterialTypeController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    Route::get('users','Api\MaterialController@getUser');
    Route::get('cantidad_materials','Api\MaterialController@getCantMat');
    Route::get('material_views','Api\MaterialController@topViews');
    Route::get('areas_views','Api\MaterialController@topAreas');
});
