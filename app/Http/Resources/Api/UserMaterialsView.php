<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMaterialsView extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
<<<<<<< HEAD
       
            return [
                'titulo'   =>$this->title,
                'vistas'   =>$this->vistas
            ];
        
=======
        return [
			'titulo'	=>	$this->title,
			'vistas'	=>	$this->vistas
		];
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
    }
}
