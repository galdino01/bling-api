<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules(){
        return [
            'category_id' => ['required'],

            'origin' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'price' => ['required'],
            'price_cost' => ['required'],
            'warranty' => ['nullable', 'max:32'],
            'notes' => ['nullable', 'max:255'],

            'width' => ['nullable'],
            'height' => ['nullable'],
            'depth' => ['nullable'],
            'net_weight' => ['nullable'],
            'gross_weight' => ['nullable'],

            'quantity' => ['required'],
            'localization' => ['required', 'max:255'],

            'images' => ['nullable', 'array'],

            'expiration_date' => ['nullable', 'date'],
        ];
    }

    public function messages() {
        return [
            'required' => 'Este campo é obritório',
            'max' => 'Este campo aceita somente 255 caracteres'
        ];
    }
}
