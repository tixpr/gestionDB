<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class promedioViewE2 extends JsonResource
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
            'area'		=>	$this->area,
            'cantidad'	=>	$this->cantidad,
            'tipo'		=>	$this->type,
            'titulo'	=>	$this->title		];
    }
}
