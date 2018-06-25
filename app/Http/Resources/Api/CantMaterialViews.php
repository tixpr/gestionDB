<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class CantMaterialViews extends JsonResource
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
            'titulo' =>$this->title,
            'tipo'	=>	$this->type,
            'area' => $this->area,
			'cantidad'	=>	$this->cantidad,

		];
    }
}
