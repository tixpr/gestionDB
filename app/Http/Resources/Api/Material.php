<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Language as LanguageResource;


class Material extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'titulo'  => $this->title,
            'idioma'  => New LanguageResource($this->language),
            'tipo'    => $this->material_type->type,
            'resumen' => $this->abstract
        ];
    }
}
