<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material, Area, MaterialType};

use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, LeidoPorTipo, User, CantidadMaterial, MaterialViews, AreaViews, Prob2};
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
    public function LeidoPorTipo()
	{
		$resultados = MaterialType::select(
			DB::raw('material_types.type, count(user_view_materials.id) as veces_leido')
			)
        ->join('materials', 'material_types.id', '=', 'materials.material_type_id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'materials.id')
	
        ->groupBy('material_types.type')
        ->havingRaw('count(user_view_materials.id) >(SELECT avg(count(user_view_materials.id))/(SELECT COUNT(user_view_materials.id) FROM materials join user_view_materials on (materials.id = user_view_materials.id)) FROM user_view_materials)')
        ->orderBy('veces_leido','desc')
		//->limit(10)
		->get();
		return LeidoPorTipo::collection($resultados);
    }
    //Obtener los materiales que esten por encima de la media de las lecturas de materiales, mostrando los campos
    //del titulo del material, tipo de material, area del material y la cantidad de lecturas; con su animación y 
    //presentación: material, areas, material_types, material_areas, user_view_materials 
    public function Prob2()
	{
		$resultados = Area::select(
            DB::raw('materials.title, material_types.type, areas.area, 
            count(user_view_materials.id) as cantidad_lecturas')
            )   
        ->join('material_areas', 'areas.id', '=', 'material_areas.area_id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'material_areas.material_id')
        ->join('materials', 'material_areas.material_id', '=', 'materials.id')
        ->join('material_types', 'materials.material_type_id', '=', 'material_types.id')
        ->groupBy('materials.id','materials.title', 'material_types.type', 'areas.area')
        //->having('cantidad_lecturas','=','(SELECT count(user_view_materials.id) FROM user_view_materials 
        ->havingRaw('count(user_view_materials.id) >(SELECT avg(user_view_materials.id)/(SELECT avg(user_view_materials.id) FROM materials join user_view_materials on (materials.id = user_view_materials.id)) FROM user_view_materials)')
        //inner join "material_areas" on "areas"."id" = "material_areas"."area_id" inner join "user_view_materials" on "material_areas"."material_id" = "user_view_materials"."material_id"')     
     ->orderBy('cantidad_lecturas', 'desc')
        
      ->get();
      return Prob2::collection($resultados);
  }
  //Ejemplo
	//$teams = DB::table('teams')
    //->select(DB::raw('id, name, (SELECT COUNT(id_team_local) FROM seasons WHERE id_team_local = teams.id) 
    //AS 'Partidos jugados'))
    //->get();
}	
