<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class Language extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
<<<<<<< HEAD:app/Http/Resources/Api/Language.php
        return [
			
			'Idioma'		=>	$this->language,
			
		];
=======
        return ['idioma' => $this->language];
>>>>>>> a149452c5d4769b16f8d85034ab6608beec30723:app/Http/Resources/Api/Language.php
    }
}
