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
}
