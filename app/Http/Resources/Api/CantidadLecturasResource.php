<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CantidadLecturasResource extends JsonResource
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
            'type'  =>$this->type,
            'titulo'   =>$this->title,
            'area'   =>$this->area,
            'cantidad'  =>$this->cantidad
        ];
    }
}
