<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material,Area,MaterialType};
use DB;
use App\Http\Resources\Api\{Material as MaterialResource,PromedioMat, UserMaterialsView,CantidadMaterials,UsuarioLectura,MaterialsViews,AreasViews,TipoMateriales};
use App\Http\Requests\{UserMaterialsViewRequest,UsuarioLecturaRequest};
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
    public function getNumeroMat()
	{
		$resultados = Material::select(
			DB::raw('languages.language, count(materials.id) as cantidadmat')
			)
		->join('languages', 'materials.language_id', '=', 'languages.id')
		->groupBy('languages.language')
		->orderBy('cantidadmat','desc')
		->get();
		return CantidadMaterials::collection($resultados);
	}
    public function getUsuarioLectura(UsuarioLecturaRequest $request)
	{
		$salida = Material::select(
			DB::raw('users.name ,materials.title, count(user_view_materials.material_id) as nro_leido')
            )
             ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
             ->join('users', 'materials.user_id', '=', 'users.id')
	         ->where('users.name',$request->name)
             ->groupBy('users.name','materials.title')
             ->orderBy('nro_leido','desc')
		
		->get();
		return UsuarioLectura::collection($salida);
    }
    public function topViews(){
        $resultados=Material::select(
            DB::raw('materials.title, count(user_view_materials.id) as cantidad')
			)
		->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
		->groupBy('materials.title')
        ->orderBy('cantidad','desc')
        ->limit(10)
        ->get();
        return MaterialsViews::collection($resultados);
    }
    public function topAreas(){
           $resultados=Area::select(
               DB::raw('areas.area, count(user_view_materials.id) as cantidad')
           )
            ->join('material_areas','areas.id','=','material_areas.area_id')
            ->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
            ->groupby('areas.area')
            ->orderBy('cantidad','desc')
            ->get();
            return AreasViews::collection($resultados);
    }
    public function tipomaterial(){
        $salida=MaterialType::select(
            DB::raw('material_types.type, count(user_view_materials.id) as leido')
        )
         ->join('materials','material_types.id','=','materials.material_type_id')
         ->join('user_view_materials','user_view_materials.material_id','=','materials.id')
       
         ->groupby('material_types.type')
         ->orderBy('leido','desc')
         ->get();
         return TipoMateriales::collection($salida);
 }
 public function Promedio()
    {
        $resultados = Area::select(
            DB::raw('areas.area, materials.title, material_types.type, count(user_view_materials.id) as cantidad')
            )   
        ->join('material_areas', 'areas.id', '=', 'material_areas.area_id')
        ->join('user_view_materials', 'user_view_materials.material_id', '=', 'material_areas.material_id')
        ->join('materials', 'user_view_materials.material_id', '=', 'materials.id')
        ->join('material_types', 'materials.material_type_id', '=', 'material_types.id')
        ->groupBy('areas.area', 'materials.title', 'material_types.type')
    
        ->havingRaw('count(user_view_materials.id) >(SELECT count(user_view_materials.id)/(SELECT count(user_view_materials.id)
         FROM materials join user_view_materials on (materials.id = user_view_materials.id)) 
         FROM user_view_materials)')
            
     ->orderBy('cantidad', 'desc')
        
      ->get();
      return PromedioMat::collection($resultados);
  }

}
