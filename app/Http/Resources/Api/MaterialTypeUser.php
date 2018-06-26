<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialTypeUser extends JsonResource
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
            'tipo'=>$this->type ,
            'area'=>$this->area,
            'titulo'=>$this->title,
            'cantidad'=>$this->cantidad
        ];
    }
}
