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
<<<<<<< HEAD
    Route::get('materials','Api\MaterialController@index');
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialtype','Api\MaterialTypeController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    

=======
	Route::get('materials','Api\MaterialController@index');
	Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
});
