<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material , Area};
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, LanguageMaterialsView , NameUserMaterials,MaterialsViews,AreaViews,AvgMaterialView,TypeView};
use App\Http\Requests\UserMaterialsViewRequeste;
use App\Http\Requests\LanguageMaterialsViewRequeste;
use App\Http\Requests\NameUserMaterialRequeste;

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

    public function getUserMaterialsView(UserMaterialsViewRequeste $request)
    {
        $resultado=Material::select(
                DB::raw('materials.title , count(user_view_materials.id) as vistas '))
            ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
            ->where('materials.user_id',$request->user_id)
            ->groupBy('materials.title')
            ->orderBy('vistas','desc')
            ->get();
            return UserMaterialsView::collection($resultado);
    }
    public function getLanguageMaterialsView(request $request)
    {
        $resultado = Material::select(
            DB::raw('languages.language,count(materials.id) as cantidad'))
            ->join('languages','materials.language_id','=','languages.id')
            ->where('materials.language_id',$request->language_id)
            ->groupBy('language_id','languages.id')
            ->get();
        return LanguageMaterialsView::collection($resultado);
    }

    public function getNameUserMaterials(NameUserMaterialRequeste $request)
    {
        $resultado = Material::select(
            DB::raw('materials.title, count(user_view_materials.id) as leido'))
            ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
            ->join('users','users.id','=','materials.user_id')
            ->where('users.name',$request->name)
            ->groupBy('materials.title')
            ->orderBy('leido','desc')
            ->get();
        return NameUserMaterials::collection($resultado);
    }

    public function topViews(){
        $resultado=Material::select(
            DB::raw('materials.title , count(user_view_materials.id) as cantidad '))
            ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
            ->groupBy('materials.title')
            ->orderBy('cantidad','desc')
            ->limit(10)
            ->get();
        return MaterialsViews::collection($resultado);
    }
    public function topAreas(){
        $resultado=Area::select(
            DB::raw('areas.area , count(user_view_materials.id) as cantidad '))
            ->join('material_areas','areas.id','=','material_areas.area_id')
            ->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
            ->groupBy('areas.area')
            ->orderBy('cantidad','desc')
            ->get();
        return AreaViews::collection($resultado);
    }
    public function topTypes(){
        $resultados=Material::select(
            DB::raw('material_types.type as tipo , count(user_view_materials.id) as cantidad '))
            ->join('material_types','materials.material_type_id','=','material_types.id')
            ->join('user_view_materials','user_view_materials.material_id','=','materials.id')
            ->groupBy('material_types.type')
            ->orderBy('cantidad','desc')
            ->get();
        return TypeView::collection($resultados);
    }
    public function avgMaterialViews(){
        $resultado = Material::select(
            DB::raw('materials.title as titulo ,material_types.type as tipo ,areas.area,count(user_view_materials.id) as cantidad'))
            ->join('material_types','materials.material_type_id','=','material_types.id')
            ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
            ->join('material_areas','user_view_materials.material_id','=','material_areas.material_id')
            ->join('areas','material_areas.area_id','=','areas.id')
            ->havingraw('count(user_view_materials.id) > 
                (select avg from (
                    select trunc(sum(cantidad)/count(cantidad),0) as avg from(
                        select count(id) as cantidad from user_view_materials group by material_id) as s1) as s2)')
            ->groupBy('title','type','area')
            ->orderBy('cantidad','desc')
            ->get();
        return AvgMaterialView::collection($resultado);
    }
}