<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules() {
        $rules = [
            "owner_email" => "required|email",
            "road" => "required",
            "neighborhood" => "required",
            "city" => "required",
            "state" => "required",
        ];
        return $rules;
    }

}
