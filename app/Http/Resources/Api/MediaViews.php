<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaViews extends JsonResource
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
            'Titulo'        => $this->title,
            'Tipo'      => $this->type,
            'Area'        => $this->area,
            'Cantidad'      => $this->cantidad,
        ];
    }
}
