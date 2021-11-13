<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest {
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
            "email_contractor" => "required|email",
            "property_id" => "required",
            "type_document" => "required",
            "full_name_contractor" => "required",
        ];
        if($this->type_document === "PJ"){
            $rules = array_merge($rules, [
               "document" => "required|cnpj",
            ]);
        }else if($this->type_document === "PF"){
            $rules = array_merge($rules, [
                "document" => "required|cpf",
            ]);
        }
        return $rules;
    }
}
