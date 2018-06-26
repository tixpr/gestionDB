<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material, Area, MaterialType};
use DB;
use App\Http\Resources\Api\{Material as MaterialResource, 
    UserMaterialsView, 
    LanguageMaterials, 
    UserMaterialsForName, 
    MaterialViews,
    AreaViews,
    MaterialTypeViews,
    CountMaterials};
use App\Http\Requests\{UserMaterialsViewRequest, UserMaterialsForNameRequest};

class MaterialController extends Controller
{
    public function index()
    {
        return MaterialResource::collection(Material::orderBy('title','asc')->get());
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

    public function getLanguageMaterials(request $request)
    {
        $cantidad = Material::select(
            DB::raw('languages.language,count(materials.id) as cantidad')
            )
            ->join('languages','materials.language_id','=','languages.id')
            ->where('materials.language_id',$request->language_id)
            ->groupBy('language_id','languages.id')
            ->get();
        return LanguageMaterials::collection($cantidad);
    }

    public function getUserMaterialsForName(UserMaterialsForNameRequest $request)
    {
        $cantName = Material::select(
            DB::raw('materials.title, count(user_view_materials.id) as leido')
            )
            ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
            ->join('users','users.id','=','materials.user_id')
            ->where('users.name',$request->name)
            ->groupBy('materials.title')
            ->orderBy('leido','desc')
            ->get();
        return UserMaterialsForName::collection($cantName);
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
            ->join('material_areas','areas.id','=','material_areas.area_id')
            ->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
            ->groupBy('areas.area')
            ->orderBy('cantidad','desc')
            ->get();
        return AreaViews::collection($resultados);
    }

    public function topTypeMaterials()
    {
        $resultados = MaterialType::select(
            DB::raw('material_types.type, count(user_view_materials.id) as cantidad')
        )
        ->join('materials','materials.material_type_id','=','material_types.id')
        ->join('user_view_materials','user_view_materials.material_id','=','materials.id')
        ->groupBy('material_types.type')
        ->orderBy('cantidad','desc')
        ->get();
        return MaterialTypeViews::collection($resultados);
    }

    public function topCountMaterials()
    {
        $resultados = Material::select(
            DB::raw('materials.title, material_types.type, areas.area, count(user_view_materials.id) as cantidad')
        )
        ->join('material_types','materials.material_type_id','=','material_types.id')
        ->join('material_areas','materials.id','=','material_areas.material_id')
        ->join('areas','areas.id','=','material_areas.area_id')
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
        ->groupBy('materials.title', 'material_types.type', 'areas.area')
        ->havingRaw('count(user_view_materials.id)  >  (select trunc(avg(cant),0) 
                                                        from (
                                                            select count(id) cant 
                                                            from user_view_materials 
                                                            group by material_id
                                                        ) de
                                                       )'
        )
        ->orderBy('cantidad','desc')
        ->get();
        return CountMaterials::collection($resultados);
    } 
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
