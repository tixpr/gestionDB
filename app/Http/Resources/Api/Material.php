<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'titulo'    => $this->title,
            'idioma'    =>$this->language->language,
            'tipo'      =>$this->material_type->type,
            'resumen'   =>$this->abstract
        ];
    }
}
