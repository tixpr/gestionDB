<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserMaterialsLanguageView extends JsonResource
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
            
			'IDIOMA'	=>	$this->language,
            'CANTIDAD'	=>	$this->cantidad,
           
		];
    }
}
