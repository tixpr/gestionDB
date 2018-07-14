<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Language,MaterialType};

class MaterialController extends Controller
{
	//metodo para presentar la vista de mostrar un determinado material
    public function show()
	{
		return view('show_material');
	}

	//metodo para mostrar la vista de creacion de un material
	public function store()
	{
		return view('add_material',['languages'=>Language::all(),'material_types'=>MaterialType::all()]);
	}

	//metodo para mostrar la vista de actualizacion de un amterial
	public function update()
	{
		return view('update_material',['languages'=>Language::all(),'material_types'=>MaterialType::all()]);
	}

	//métdo para mostrar la vista de eliminacion de un material
	public function destroy()
	{
		return view('delete_material');
	}
}
