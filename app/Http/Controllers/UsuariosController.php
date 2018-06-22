<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios=DB::table('users')
                    ->select('id', 'name')
                    
                    ->get();
                    return view("vistas",["usuarios"=>$usuarios]); 
    }

}
