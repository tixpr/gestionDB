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

Route::middleware(['auth:api','cors'])->group(function(){
    Route::get('materials','Api\MaterialController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    Route::get('materials_languages','Api\MaterialController@getLanguageMaterialsView');
    Route::get('user_materials_name','Api\MaterialController@getNameUserMaterials');
    Route::get('material_views','Api\MaterialController@topViews');
    Route::get('areas_view','Api\MaterialController@topAreas');
    Route::get('type_views','Api\MaterialController@topTypes');
    Route::get('avg_views','Api\MaterialController@avgMaterialViews');
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialtypes','Api\MaterialTypeController@index');
    Route::get('user','Api\UserController@index');
});