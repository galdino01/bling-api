<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'category_id' => 'required',

            'name' => ['required', 'max:255'],
            'origin' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'price' => 'required',
            'price_cost' => 'required',
            'warranty' => ['nullable', 'max:255'],
            'notes' => ['nullable', 'max:255'],

            'width' => 'nullable',
            'height' => 'nullable',
            'depth' => 'nullable',
            'net_weight' => 'nullable',
            'gross_weight' => 'nullable',

            'quantity' => 'required',
            'localization' => ['required', 'max:255'],

            'image' => ['nullable', 'image'],

            'expiration_date' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be :max characters.',
            'image' => 'The :attribute field must be an image.',
        ];
    }
}
