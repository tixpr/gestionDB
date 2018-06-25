<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class Prob2 extends JsonResource
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
            'tipo'=> $this->type,
            'cantidad_lecturas'=> $this->cantidad_lecturas,
            'area'=> $this->area,
            'titulo'=> $this->title
    ];
    }
}
