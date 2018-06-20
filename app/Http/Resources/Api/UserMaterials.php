<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMaterials extends JsonResource
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
			'nombre'=>$this->name,
            'titulo'	=>	$this->title,
            'cantidad_leida'=> $this->cantidad_leida
            
		];
    }
}
