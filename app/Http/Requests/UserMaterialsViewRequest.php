<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMaterialsViewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
<<<<<<< HEAD
        return false;
=======
        return true;
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            //
=======
            'user_id'	=>	'required|exists:users,id'
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
        ];
    }
}
