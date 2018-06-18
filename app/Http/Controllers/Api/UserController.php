<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use App\Http\Resources\Api\User as UserResource;


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
   /* public function getUsersMaterial(UserMaterialsReadRequest $request)
	{
		$resultados = User::select(
			DB::raw('materials.title, count(materials.id) as leidos')
			)
		->join('materials', 'user.materials_id', '=', 'materials.id')
		->where('user.name',$request->user_name)
		->groupBy('materials.title')
		->orderBy('leidos','desc')
		->get();
		return UsersMaterial::collection($resultados);
    }*/
    public function formulario(){
        $users = User::with('name','id')->get(); 
 //algo general...

 //enviamos los datos a la vista
        return view('leidos', compact('$users'));
  }
}