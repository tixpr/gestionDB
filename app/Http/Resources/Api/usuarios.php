<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class usuarios extends JsonResource
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
            'tema'	=>$this->title,
			'usuarios'=>$this->name,
			'lecturas'=>$this->lecturas
        ];
    }
}
