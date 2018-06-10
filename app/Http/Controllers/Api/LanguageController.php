<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Resources\Api\Language as LanguageResource;

class LanguageController extends Controller
{
    public function index()
    {
        return LanguageResource::collection(Language::orderBy('language','asc')->get());
    }

}
