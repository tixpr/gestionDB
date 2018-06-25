<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialAll extends JsonResource
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
            'titulo'    =>$this->title,
            'tipo'      =>$this->type,
            'area'      =>$this->area,
            'lecturas'  =>$this->lecturas
        ];
    }
}
