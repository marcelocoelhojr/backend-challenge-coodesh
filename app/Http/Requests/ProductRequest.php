<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "code" =>  'required',
            "status" => 'required',
            "imported_t" =>  'required',
            "url" => 'required',
            "creator" =>  'required',
            "created_t" =>  'required',
            "last_modified_t" =>  'required',
            "product_name" =>  'required',
            "quantity" =>  'required',
            "brands" =>  'required',
            "categories" =>  'required',
            "labels" =>  'required',
            "cities" => 'required',
            "purchase_places" => 'required',
            "stores" =>  'required',
            "ingredients_text" => 'required',
            "serving_size" => 'required',
            "serving_quantity" =>  'required',
            "nutriscore_score" =>  'required',
            "nutriscore_grade" =>  'required',
            "main_category" =>  'required',
            "image_url" =>  'required'
        ];
    }
}
