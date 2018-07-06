<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaTypeMaterialView extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'title' => $this ->title,
            'area'=> $this->area,
            'tipo'		=>	$this->type,
            'cantidad' =>$this->cantidad,
        ]; 
    }
}
