<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material, Area};

use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, User, CantidadMaterial, MaterialViews, AreaViews};
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\UserRequest;
use DB;
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
    public function getUser(UserRequest $request)
	{
		$resultadoss = Material::select(
			DB::raw('users.name ,materials.title, count(user_view_materials.material_id) as veces_leido')
            )
            ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
        ->join('users', 'materials.user_id', '=', 'users.id')
        
	->where('users.name',$request->name)
        ->groupBy('users.name','materials.title')
        ->orderBy('veces_leido','desc')
		
		->get();
		return User::collection($resultadoss);
    }
    
    public function getCantMat()
	{
		$resultadoss = Material::select(
			DB::raw('languages.language, count(materials.id) as cantmat')
			)
		->join('languages', 'materials.language_id', '=', 'languages.id')
	
        ->groupBy('languages.language')
        ->orderBy('cantmat','desc')
		
		->get();
		return CantidadMaterial::collection($resultadoss);
    }
    public function topViews()
	{
		$resultados = Material::select(
			DB::raw('materials.title, count(user_view_materials.id) as cantidad')
			)
		->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
	
        ->groupBy('materials.title')
        ->orderBy('cantidad','desc')
		->limit(10)
		->get();
		return MaterialViews::collection($resultados);
    }
	public function topAreas()
	{
		$resultados = Area::select(
			DB::raw('areas.area, count(user_view_materials.id) as cantidad')
			)
        ->join('material_areas', 'areas.id', '=', 'material_areas.area_id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'material_areas.material_id')
	
        ->groupBy('areas.area')
        ->orderBy('cantidad','desc')
		//->limit(10)
		->get();
		return AreaViews::collection($resultados);
    }
	
	
}
