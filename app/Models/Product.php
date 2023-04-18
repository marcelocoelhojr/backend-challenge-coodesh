<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'external_id',
        'product_name',
        'status',
        'imported_t',
        'url',
        'product_file',
        'payload'
    ];

    /**
     * Validation rules.
     *
     * @return array
     */
    public static function getValidation(): array
    {
        return [
            'status' => [
                'required',
                Rule::in(['draft', 'trash', 'published']),
            ],
            "imported_t" =>  'required|integer',
            "url" => 'required|string',
            "creator" =>  'required|string',
            "created_t" =>  'required|integer',
            "last_modified_t" =>  'integer',
            "product_name" =>  'nullable|string',
            "quantity" =>  'nullable|string',
            "brands" =>  'nullable|string',
            "categories" =>  'nullable|string',
            "labels" =>  'nullable|string',
            "cities" => 'nullable|string',
            "purchase_places" => 'nullable|string',
            "stores" =>  'nullable|string',
            "ingredients_text" => 'nullable',
            "serving_size" => 'nullable',
            'serving_quantity' => [
                'required',
                'numeric',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
            "nutriscore_score" =>  'nullable|integer',
            "nutriscore_grade" =>  'nullable|integer',
            "main_category" =>  'nullable|string',
            "image_url" =>  'nullable|string'
        ];
    }
}
