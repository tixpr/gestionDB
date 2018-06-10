<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaterialType;
use App\Http\Resources\Api\MaterialType as MaterialTypeResource;

class MaterialTypeController extends Controller
{
    public function index()
    {
        return MaterialTypeResource::collection(MaterialType::orderBy('type','asc')->get());
    }

}
