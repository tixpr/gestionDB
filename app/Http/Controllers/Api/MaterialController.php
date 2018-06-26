<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Material,Area};
use App\Http\Resources\Api\{MaterialTop,Material as MaterialResource, ReadUserView,UserMaterialsView, MaterialsPorLanguage, MaterialViews, AreaViews};
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
        ->where('users.name',$request->name)
        ->groupBy('users.name','materials.title')
        ->orderBy('leidos','desc')
        ->get();
        return ReadUserView::collection($resultados);
    }
    /*clase de 22/06/2018*/
    public function topViews(){
        $resultados = Material::select (
        DB::raw('materials.title, count(user_view_materials.id) as cantidad')) 
        ->join('user_view_materials','materials.id','=','user_view_materials.material_id')
        ->groupBy('materials.title')
        ->orderBy('cantidad', 'desc')
        ->limit(10)
        ->get();
          return MaterialViews::collection($resultados) ;
    }
    public function topAreas(){
        $resultados = Area::select(
            DB::raw('areas.area, count(user_view_materials.id) as cantidad')
        )
        ->join('material_areas','areas.id','=','material_areas.area_id')
        ->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
        ->groupBy('areas.area')
        ->orderBy('cantidad', 'desc')
        ->get();
        return AreaViews::collection($resultados) ;
    }
   
    // Obtener los materiales que esten  por encima de la media de las
    // lecturas de materiales mostrando los campos 
    // (titulo de material, tipo de material(nombre del tipo),
    // area del material(nombre del area)
    // y la cantidad de lecturas), 
    // con su respectiva animacion y presentacion.


    // primer paso: contar la cantidad de materiales leidos que
    // esta en la tabla user_view_materials
    // segundo paso: OBTENER LA COLUMNA materials.title
    // tercer paso: obtener el tipo de material em 
    // la columna material_types.material_types
    // cuarto paso: obtener la columna area de material en la tabla
    // areas.area

    // select m.title , mt.type, area , count(uv.material_id) as cant from materials as m 
    // inner join material_areas as a on m.id = a.material_id
    // inner join user_view_materials as uv on m.id = uv.material_id
    // inner join areas as ar on a.area_id=ar.id
    // inner join material_types as mt on m.material_type_id = mt.id

    // where m.id >(select avg(uv.material_id) from user_view_materials as uv) 
    // group by (m.title,mt.type,ar.area)
    // order by (cant)
    // ;
    





    public function redondeo(){
        
        return ($res);
    }

    public function MaterialTop(){
        $res = Material::select(DB::raw('trunc((avg(user_view_materials.material_id)))')
        )->join('user_view_materials','user_view_materials.material_id','='
        ,'materials.id')->get();
        $re= json_decode($res,true);
        
        $resultados = Material::select(
            DB::raw('materials.title , material_types.type, areas.area ,
             count(user_view_materials.material_id) as cant,(avg(user_view_materials.material_id)) as media')
        )
       
         ->join('material_areas','materials.id','=','material_areas.material_id')
         ->join('user_view_materials','user_view_materials.material_id','=',
         'materials.id')
         ->join('areas','areas.id','=','material_areas.area_id')
        ->join('material_types','material_types.id','=','materials.material_type_id')
        
        ->where ('materials.id','>',$re)
 
        ->groupBy('materials.title','material_types.type','areas.area')
        ->orderBy('cant', 'desc') 
        ->get();

        return MaterialTop::collection($resultados) ;
    }

    
    
}
