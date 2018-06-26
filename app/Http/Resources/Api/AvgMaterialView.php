<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AvgMaterialView extends JsonResource
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
            'titulo'    => $this->titulo,
            'tipo'      => $this->tipo,
            'cantidad'  => $this->cantidad,
        ];
    }
}
