<?php
namespace App\Http\Controllers\Api;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaterialType;
use App\Http\Resources\Api\{MaterialType as MaterialTypeResource,MaterialTypesQuantity};
class MaterialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MaterialTypeResource::collection(MaterialType::orderBy('id','asc')->get());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function materialRead(){
        $resultados = MaterialType::select(
            DB::raw('material_types.type, count(user_view_materials.material_id) as cantidad')
        )
        ->join('user_view_materials','user_view_materials.material_id','=','material_types.id')
        ->groupBy('material_types.type')
        ->orderBy('cantidad', 'desc')
        ->get();
        return MaterialTypesQuantity::collection($resultados) ;
    }
    
}