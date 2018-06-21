<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use DB;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, UserMaterialsForName};
use App\Http\Resources\Api\LanguageMaterials;
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\UserMaterialsForNameRequest;

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
