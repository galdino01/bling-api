<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    public function authorize() {
        return false;
    }

    public function rules(){
        return [
            'category_id' => ['required'],

            'origin' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'price_cost' => ['required', 'numeric'],
            'warranty' => ['nullable', 'string', 'max:32'],
            'notes' => ['nullable', 'string', 'max:255'],

            'unit_of_measure' => ['nullable', 'string', 'max:3'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'depth' => ['nullable', 'numeric'],
            'net_weight' => ['nullable', 'numeric'],
            'gross_weight' => ['nullable', 'numeric'],

            'quantity' => ['required', 'integer'],
            'localization' => ['required', 'string', 'max:255'],

            'images' => ['nullable', 'array'],

            'expiration_date' => ['nullable', 'date'],
        ];
    }
}
