<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest {
    public function authorize() {
        return false;
    }

    public function rules() {
        return [
            'user_id' => ['required'],

            'discount' => ['nullable', 'numeric'],
            'cost_of_freight' => ['nullable', 'numeric'],
            'other_expenses' => ['nullable', 'numeric'],
            'total_of_products' => ['required', 'integer'],
            'total_sale' => ['required', 'numeric'],
            'notes' => ['nullable', 'string', 'max:255'],

            'output_date' => ['required', 'date'],
        ];
    }

    public function messages() {
        return [
            'required' => 'The :attribute field is required.',
            'date' => 'The :attribute field must be a date.',
            'integer' => 'The :attribute field must be an integer.',
            'numeric' => 'The :attribute field must be a numeric.',
            'string' => 'The :attribute field must be a string.',
            'max' => 'The :attribute field must be :max characters.',
        ];
    }
}
