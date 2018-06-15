<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Http\Resources\Api\Material as MaterialResource;

class MaterialController extends Controller
{
    /** 
     * Display a listing of the resource
     * 
     * @return \-illuminate\Http\Response
     
    */
    public function index()
    {
        return MaterialResource::collection(Material::orderBy('title','asc')->get());
    }
public function postUserMaterialsView(Request $request)
{
    Material::select(
        DB::raw('materials.title, count(user_view_material.id) as vistas')
    )
    ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
    ->where('materials.user_id',$request->user_id)
    ->groupBy('materials.title')
    ->orderBy('vistas')
    ->get();
}


}
