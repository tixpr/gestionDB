<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use DB;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView,LanguageMaterialsView,usuarios};
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\UserMaterialsRootRequest;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MaterialResource::collection(Material::orderBy('title','asc')->get());
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

	public function getUserMaterialsView(UserMaterialsViewRequest $request)
	{
		$resultados = Material::select(
			DB::raw('materials.title, count(user_view_materials.id) as vistas')
			)
		->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
		->where('materials.user_id',$request->user_id)
		->groupBy('materials.title')
		->orderBy('vistas','desc')
		->get();
		return UserMaterialsView::collection($resultados);
    }
    public function getLanguageMaterialsView()
	{
		$totalidad = Material::select(
			DB::raw('materials.language_id, count(languages.id) as libros')
			)
		->join('languages', 'languages.id', '=', 'materials.language_id')
		->groupBy('materials.language_id')
		->orderBy('libros','desc')
		->get();
		return LanguageMaterialsView::collection($totalidad);
	}
	public function getusuarios(UserMaterialsRootRequest $request)
	{
		$totalidad = Material::select(
			DB::raw('users.name,materials.title, count(user_view_materials.material_id) as lecturas')
			)
        ->join('users', 'materials.user_id', '=', 'users.id')
        ->where('users.name',$request->name)
		->groupBy('users.name','materials.title')
		->orderBy('lecturas','desc')
		->get();
		return usuarios::collection($totalidad);
	}

}
