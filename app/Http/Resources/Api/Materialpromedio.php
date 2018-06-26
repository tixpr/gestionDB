<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class Materialpromedio extends JsonResource
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
            'title' => $this ->title,
            'type' => $this ->type,
            'area' => $this ->area,
            'cantidad' => $this ->cantidad
        ];
    }
}
    
    