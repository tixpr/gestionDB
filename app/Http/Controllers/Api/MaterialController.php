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
}
