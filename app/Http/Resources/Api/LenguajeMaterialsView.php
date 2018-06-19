<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageMaterialsView extends JsonResource
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
			'Materiales'	=>	$this->title,
            'Idioma'	    =>	$this->language,
            'Cantidad'	    =>	$this->cantidad
		];
    }
}