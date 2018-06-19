<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use DB;
use App\Http\Resources\Api\{User as UserResource, Material, UserMaterialsView};
use App\Http\Requests\UserMaterialsReadRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::orderBy('name','asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getRead(UserMaterialsReadRequest $request)
	{   
		$resultadoss = User::select(
			DB::raw('materials.title, count(user_view_materials.id) as vistas')
			)
		->join('materials', 'materials.user_id', '=', 'users.id')
        ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
        ->where('users.name',$request->user_name)
		->groupBy('materials.title')
		->orderBy('vistas','desc')
		->get();
        return UserMaterialsView::collection($resultadoss);
    }
}