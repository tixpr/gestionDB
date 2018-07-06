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


Route::middleware(['auth:api','cors'])->group(function(){
    Route::get('materials','Api\MaterialController@index');
    Route::get('language','Api\LanguageController@index');
    Route::get('materialtype','Api\MaterialtypeController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    Route::get('materials_por_language ','Api\MaterialController@getMaterialsLanguage');
    Route::get('user_materials ','Api\MaterialController@getUserMaterials');
    Route::get('material_views ','Api\MaterialController@topViews');
    Route::get('areas_views ','Api\MaterialController@topAreas');
    Route::get('material_view ','Api\MaterialController@topMaterials');
    Route::get('area_type_material_view ','Api\MaterialController@getAreaTypeMaterialView');
});
