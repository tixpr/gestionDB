<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material, Area, MaterialType};
use DB;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, User, Language, MaterialViews, AreaViews, MaterialTypes, MaterialAll};
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\LanguageMaterialsRequest;
use App\Http\Requests\MaterialsTypeRequest;
use App\Http\Requests\PromedioMaterialsRequest;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function getLanguage(LanguageMaterialsRequest $request)
	{   
		$resultadoss = Material::select(
			DB::raw('languages.language, count(materials.language_id) as cantidad_material')
			)
        ->join('languages', 'languages.id', '=', 'materials.language_id')
        ->where('materials.language_id', $request->language_id)
        ->groupBy('languages.language')
        ->orderBy('cantidad_material','desc')
		->get();
        return Language::collection($resultadoss);
    }
    public function topViews()
	{   
		$resultados = Material::select(
            DB::raw('materials.title, count(user_view_materials.id) as cantidad')
			)
		->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
		//->where('materials.user_id',$request->user_id)
		->groupBy('materials.title')
        ->orderBy('cantidad','desc')
        ->limit (10)
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
		//->where('materials.user_id',$request->user_id)
		->groupBy('areas.area')
        ->orderBy('cantidad','desc')
		->get();
		return AreaViews::collection($resultados);
    }
    public function tipoCant(MaterialsTypeRequest $request)
	{   
		$resultados = Material::select(
            DB::raw('material_types.type, count(user_view_materials.id) as cantidad')
			)
        ->join('material_types', 'material_types.id', '=', 'materials.material_type_id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'materials.id')
		->where('materials.material_type_id',$request->material_type_id)
		->groupBy('material_types.type')
        ->orderBy('cantidad','desc')
		->get();
		return MaterialTypes::collection($resultados);
    }
    public function promMat(PromedioMaterialsRequest $request)
	{   
        $resultados=Material::select(
            DB::raw('materials.title, material_types.type, areas.area, count(user_view_materials.id) as lecturas') 
            )
        ->join('material_areas', 'material_areas.material_id', '=', 'materials.id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'materials.id')
        ->join('areas', 'areas.id', '=', 'material_areas.area_id')
        ->join('material_types', 'material_types.id', '=', 'materials.material_type_id')
        ->where('materials.id',$request->id)
        ->groupBy('materials.title', 'material_types.type', 'areas.area')   
        ->havingRaw('count(user_view_materials.id) >(SELECT count(user_view_materials.id)/(SELECT COUNT(user_view_materials.id) FROM materials join user_view_materials on (materials.id = user_view_materials.id)) FROM user_view_materials)')
        ->orderBy('lecturas','desc')
        ->get();
        return MaterialAll::collection($resultados);
    }
}
