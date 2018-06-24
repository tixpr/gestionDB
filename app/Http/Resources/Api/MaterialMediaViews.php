<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialMediaViews extends JsonResource
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
            'titulo'=>$this->title,
            'tipo'=>$this->type,
            'area'=>$this->area,
            'cantidad'=>$this->cantidad,
            'media'=>$this->media
        ];
    }
}
