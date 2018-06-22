<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView, LanguageMaterialsView , NameUserMaterials};
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
        $resultados=Material::select(
                DB::raw('materials.title , count(user_view_materials.id) as vistas '))
            ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
            ->where('materials.user_id',$request->user_id)
            ->groupBy('materials.title')
            ->orderBy('vistas','desc')
            ->get();
            return UserMaterialsView::collection($resultados);
    }
    public function getLanguageMaterialsView(request $request)
    {
        $total = Material::select(
            DB::raw('languages.language,count(materials.id) as cantidad'))
            ->join('languages','materials.language_id','=','languages.id')
            ->where('materials.language_id',$request->language_id)
            ->groupBy('language_id','languages.id')
            ->get();
        return LanguageMaterialsView::collection($total);
    }

    public function getNameUserMaterials(NameUserMaterialRequeste $request)
    {
        $total2 = Material::select(
            DB::raw('materials.title, count(user_view_materials.id) as leido'))
            ->join('user_view_materials', 'materials.id', '=', 'user_view_materials.material_id')
            ->join('users','users.id','=','materials.user_id')
            ->where('users.name',$request->name)
            ->groupBy('materials.title')
            ->orderBy('leido','desc')
            ->get();
        return NameUserMaterials::collection($total2);
    }
}
