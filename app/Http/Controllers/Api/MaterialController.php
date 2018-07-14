<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Models\{Material, Area};
use App\Http\Controllers\Controller;
use App\Http\Requests\UserMaterialsViewRequest;
use App\Http\Requests\Api\{CreateMaterialRequest,UpdateMaterialRequest};
use App\Http\Resources\Api\{
	Material as MaterialResource,
	UserMaterialsView,
	MaterialViews,
	AreaViews
};

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
	 * Creando un nuevo material en la base de datos
	 */
    public function store(CreateMaterialRequest $request)
    {
		$new_material = Material::create([
			'title'				=>	$request->title,
			'language_id'		=>	$request->language,
			'edition'			=>	$request->edition,
			'year'				=>	$request->year,
			'material_type_id'	=>	$request->material_type,
			'abstract'			=>	$request->abstract,
			'isbn'				=>	$request->isbn,
			'file'				=>	str_random(10),
			'user_id'			=>	$request->user()->id
		]);
		return response()->json(
			[
				"message"		=> "Material creado satisfactoriamente",
				"status_code"	=> 201
			],
			201
		);
    }

    /**
	 * Obteniendo un recursoe especifico
	 */
    public function show($id)
    {
		$material = Material::findOrFail($id);
		return new MaterialResource($material);
    }

    /**
	 * Actualizar un material especifico
	 */
    public function update(UpdateMaterialRequest $request, $id)
    {
		$new_material = Material::findOrFail($id);
		$new_material->update($request->all());
		return response()->json(
			[
				"message"		=> "Material actualizado satisfactoriamente",
				"status_code"	=> 201
			],
			201
		);
    }

    /**
	 * Eliminado un amterial especifico
	 */
    public function destroy($id)
    {
		$material = Material::findOrFail($id);
		$material->delete();
		return response()->json(
			[
				"message"		=> "Material eliminado satisfactoriamente",
				"status_code"	=> 201
			],
			201
		);
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
		->join('material_areas', 'areas.id','=','material_areas.area_id')
		->join('user_view_materials','user_view_materials.material_id','=','material_areas.material_id')
		->groupBy('areas.area')
		->orderBy('cantidad','desc')
		->get();
		return AreaViews::collection($resultados);
	}
}
