<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class Userss extends JsonResource
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
            'nombre'            =>$this->name,
            'titulo'	        =>	$this->title,
            'leidas'            => $this->leidas
         ];
    }
}
