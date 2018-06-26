<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material,Area,MaterialType};
use App\Http\Resources\Api\{
    Materials as MaterialResource, UserMaterialsView, MaterialsViews, AreaViews, MaterialTypeViews,MediaViews
};
use DB;
use App\Http\Requests\UserMaterialsViewRequest;

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
    }
//*-----------------------UserMaterialsView--------------------------------------------------------------------
        public function getUserMaterialsView(UserMaterialsViewRequest $request)
        {
        $resultados = Material::select(
             DB::raw('materials.title, count(user_view_materials.id) as vistas'))
                        ->join('user_view_materials', 'materials.id','=','user_view_materials.material_id')
                        ->where('materials.user_id',$request->user_id)
                        ->groupBy('materials.title')
                        ->orderBy('vistas','desc')
                        ->get();
         return UserMaterialsView::collection($resultados);
        }
//*----------------------------------servicio--topViews------------------------------------------------------
         public function topViews()
         {
            $resultados = Material::select(
                DB::raw('materials.title, count(user_view_materials.id) as cantidad')
                 )
                           ->join('user_view_materials', 'materials.id','=','user_view_materials.material_id')
                           ->groupBy('materials.title')
                           ->orderBy('cantidad','desc')
                           ->limit(10)
                           ->get();
        return MaterialsViews::collection($resultados);
         }    
//*---------------------------------- servicio --topAreas----------------------------------------------------
        public function topAreas()
        {
        $resultado = Area::select(
                 DB::raw('areas.area,count(user_view_materials.id) as cantidad')
                 )
                    ->join('material_areas','areas.id','=','material_areas.area_id')
                    ->join('user_view_materials','material_areas.material_id','=','user_view_materials.material_id')
                    ->groupBy('areas.area')
                    ->orderBy('cantidad','desc')
                    ->get();
                    return AreaViews::collection($resultado);
        }
//*------------------------------------tarea:ejercicio 1-------topMaterialTypes-------------------------------------------
        public function topMaterialTypes(){
            $resultado = MaterialType::select(
                DB::raw('material_types.type,count(user_view_materials.id) as cantidad')
            )
                    ->join('materials','material_types.id','=','materials.material_type_id')
                    ->join('material_areas','materials.id','=','material_areas.material_id')
                    ->join('user_view_materials','material_areas.material_id','=','user_view_materials.material_id')
                    ->groupBy('material_types.type')
                    ->orderBy('cantidad','desc')
                    ->get();
                    return MaterialTypeViews::collection($resultado);
        }
//*------------------------------------tarea:ejercicio 2-------topMediaViews--------------------------------
        public function topMediaViews(){
            $resultado = Material::select(
                DB::raw('materials.title,material_types.type,areas.area,count(user_view_materials.id) as cantidad')
                )
                ->join('material_types','materials.material_type_id','=','material_types.id')
                ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
                ->join('material_areas','user_view_materials.material_id','=','material_areas.material_id')
                ->join('areas','material_areas.area_id','=','areas.id')
                ->havingraw('count(user_view_materials.id) > 
                (select media  from (
                    select trunc(sum(cantidd)/count(cantidd),0) as media from(
                        select count(id) as cantidd from user_view_materials group by material_id) as subcons1) as subcons2)') //pongo subcons1 y subcons2 las subconsultas en FROM deben tener un alias
                                                                                      
                ->groupBy('title','type','area')
                ->orderBy('cantidad','desc')
                ->get();
                return MediaViews::collection($resultado);
            }
        
}
