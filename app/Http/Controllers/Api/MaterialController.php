<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Http\Resources\Api\{Material as MaterialResource, UserMaterialsView};
use App\Http\Requests\UserMaterialsViewRequest;
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
    public function postUserMaterialsView(){

    }
    public function getUserMaterialsView(UserMaterialsViewRequest $request){
        $resultados = Material::select ('materials.title',
        DB::raw('materials.title, count(user_view_materials.id) as vistas')) 
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
        ->where('materials.user_id',$request->user_id)
        ->groupBy('materials.title')
        ->orderBy('vistas', 'desc')
        ->get();
            return UserMaterialsView::collection($resultados);
    }
    

    // crear un servicio que nos proporcione la 
    // cantidad de materiales por idioma de  forma
    //  ordenada descendentemente

        /*
        select ma.title,count(ma.user_id) 
        from materials as  ma inner join languages as  id
        on ma.language_id = id.id  
        where ma.user_id=3 group by(ma.title)


        
        */
    public function getUserMaterialsLanguageView(){
        $resultados = Material::select('materials.title',
        DB::raw('materials.title', 'count(materials.user_id) as idioma'))
        ->join('languages','materials.language_id','=','languages.id')
        ->groupBy('materials.title')
        // ->orderBy('idioma','asc')
        ->get();
        return MaterialsPorLanguage::collection($resultados);
    }
    // realizar un servivio y su respectiva vista para obtener los 
    // materiales leidos por un usuario en el cual se mostrara 
    // el titulo de material y la cantidad de veces que ha leido el material
    // este servicio tendra como entrada el nombre del usuario
    /*

    select materials.title,count(materials.user_id) 
    from materials 
    inner join user on materials.user_id = users.id 
    group by (materials.title)
    
    */
    
    
    
}
