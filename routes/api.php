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
	Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
	Route::get('material_views','Api\MaterialController@topViews');
    Route::get('areas_views','Api\MaterialController@topAreas');
    Route::get('type_views','Api\MaterialController@topTypes');
    Route::get('read_material','Api\MaterialController@topTittle');
});
