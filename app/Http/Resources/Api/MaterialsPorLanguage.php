<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialsPorLanguage extends JsonResource
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
            'id' => $this ->language_id,
            
            
            'language'	=>	$this->language,
			'cant_material' => $this->cant_material
        ];
    }
}
