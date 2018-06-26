<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TitleView extends JsonResource
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
            'title'      => $this->titulo,
            'type'      => $this->tipo,
            'area'      => $this->area,
            'cantidad'  => $this->cantidad
        ];
    }
}
