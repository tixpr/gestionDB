<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ReadMaterialsHalf extends JsonResource
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
            'titulo'            =>  $this->title,
            'tipo_material'     =>  $this->type,
            'areas'             =>  $this->area,
            'cantidad'    =>  $this->cantidad
        ];
    }
}
