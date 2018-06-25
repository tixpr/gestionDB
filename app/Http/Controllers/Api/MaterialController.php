<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material, Area,MaterialType};
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, MaterialsLanguagesQuantity as MaterialsLanguagesResource, MaterialViews,AreaViews,MaterialTypeViews,MaterialMediaViews };
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\MaterialsLanguagesQuantity;
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

    public function getUserMaterialsView(UserMaterialsViewRequest $request){
        
        $resultados=Material::select(DB::raw('materials.title, count(user_view_materials.id) as vistas'))
                ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
                ->where('materials.user_id',$request->user_id)
                ->groupBy('materials.title')
                ->orderBy('vistas','desc')
                ->get();
                return UserMaterialsView::collection($resultados);      
    }
    public function getMaterialsLanguagesQuantity(MaterialsLanguagesQuantity $request){
        
        $materials=Material::select(DB::raw('materials.language_id, languages.language , count(materials.id) as cantidad'))
                ->join('languages','materials.language_id','=','languages.id')
                ->where('languages.id',$request->id)
                ->groupBy('materials.language_id', 'languages.language')
                ->orderBy('cantidad','desc')
                ->get(); 
                
               return MaterialsLanguagesResource::collection($materials);
                  
    }
    public function topViews(){
        $resultados=Material::select(DB::raw('materials.title, count(user_view_materials.id) as cantidad'))
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
        ->groupBy('materials.title')
        ->orderBy('cantidad','desc')
        ->limit(10)
        ->get();
        return MaterialViews::collection($resultados);
    }
    public function topAreas(){
        $resultados=Area::select(DB::raw('areas.area, count(user_view_materials.id) as cantidad'))
        ->join('material_areas','areas.id','=','material_areas.area_id')
        ->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
        ->groupBy('areas.area')
        ->orderBy('cantidad','desc')
        ->get();
        return AreaViews::collection($resultados);
    }
    public function topTipo(){
        $resultados=MaterialType::select(DB::raw('material_types.type, count(user_view_materials.id) as cantidad'))
        ->join('materials','material_types.id','=','materials.material_type_id')
        ->join('user_view_materials','user_view_materials.material_id','=','materials.id')
        ->groupBy('material_types.type')
        ->orderBy('cantidad','desc')
        ->get();
        return MaterialTypeViews::collection($resultados);
    }
    public function mediaLectura(){
        
        
        /*$media=Material::select(DB::raw('count(user_view_materials.id)/(SELECT COUNT(materials.id) FROM materials) as media'))
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id') 
        ->get();*/
       
        $resultados=MaterialType::select(DB::raw('materials.title, material_types.type, areas.area, count(user_view_materials.id) as cantidad'))
        ->join('materials','material_types.id','=','materials.material_type_id')
        ->join('user_view_materials','user_view_materials.material_id','=','materials.id')
        ->join('material_areas','material_areas.id','=','materials.material_type_id')
        ->join('areas','areas.id','=','material_areas.area_id')
        ->groupBy('materials.title', 'material_types.type', 'areas.area')   
        ->havingraw('count(user_view_materials.id) >(SELECT COUNT(user_view_materials.id)/(SELECT COUNT(materials.id) FROM materials) as media FROM user_view_materials)')
        ->orderBy('cantidad','desc')
        ->get();
        return MaterialMediaViews::collection($resultados);
    }
}
