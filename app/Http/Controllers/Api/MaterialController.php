<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use DB;
use App\Http\Resources\Api\{Material as MaterialResource, userMaterialsView};
use App\Http\Request\UserMaterialsViewRequest;

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
            'materials.title',
            DB::raw('materials.title,count(user_view_material.id) as vistas,')
        )
        ->join ('user_view_materials','materials.id','m','user_view_materials.material_id')
        ->where('materials.user_id',$revest->user_id)
        ->groupBy('materials.title')
        ->ordenBy('vistas','desc')
        ->get(); 
        return UserMaterialsView::collection($resultados);
    }
}
