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
<<<<<<< HEAD
Route::middleware('cors')->group(function(){
	Route::get('languages','Api\LanguageController@index');
});
Route::middleware('cors')->group(function(){
	Route::get('materialstype','Api\MaterialTypeController@index');
});
=======
>>>>>>> 7f79a8a76e384b2befb3e2cbaf8bcea0dbcf26ec
