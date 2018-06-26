<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialTop extends JsonResource
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
            'material' => $this->title,
            'type' => $this->type,
             'area' => $this->area,
            'cantidad' => $this->cant,

        ];
    }
}
        