<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Http\Resources\Api\{Material as MaterialResource, ReadUserView,UserMaterialsView, MaterialsPorLanguage};
use App\Http\Requests\{UserMaterialsViewRequest, UserMaterialsReadRequest};
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
                    
            select  materials.language_id,languages.language ,count (materials.id) as cant_material
            from materials inner join languages 
            on materials.language_id = languages.id
            group by materials.language_id,languages.language
            order by (cant_material) desc;
             
        */
    public function getUserMaterialsLanguageView(){
        $resultados = Material::select(
        DB::raw('materials.language_id,languages.language ,count (materials.id) as cant_material'))
        ->join('languages','materials.language_id','=','languages.id')
        ->groupBy('materials.language_id','languages.language')
        ->orderBy('cant_material','desc')
        ->get();
        return MaterialsPorLanguage::collection($resultados);
    }
    // realizar un servivio y su respectiva vista para obtener los 
    // materiales leidos por un usuario en el cual se mostrara 
    // el titulo de material y la cantidad de veces que ha leido el material
    // este servicio tendra como entrada el nombre del usuario
    /*
        
        select users.name, materials.title, count(user_view_materials.material_id) as vistas
        from materials inner join users
        on materials.user_id = users.id 
        inner join user_view_materials 
        on materials.id = user_view_materials.material_id
        where users.name = 'DE LA CRUZ FERNANDEZ JUANA'
        group by ( materials.title,users.name)
        order by vistas desc;
    */

     public function getMaterialsReadUser(UserMaterialsReadRequest $request){
        $resultados = Material::select(
        DB::raw('users.name, materials.title, count(user_view_materials.material_id) as leidos'))
        ->join('users','materials.user_id','=','users.id')
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
        ->where('users.id',$request->user_id)
        ->groupBy('users.name','materials.title')
        ->orderBy('leidos','desc')
        ->get();
        return ReadUserView::collection($resultados);
    }
    
    
}
