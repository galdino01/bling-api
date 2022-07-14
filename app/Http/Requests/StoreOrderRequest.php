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

            'number' => ['required'],

            'status' => ['required'],
            'discount' => ['required', 'nullable'],
            'cost_of_freight' => ['required', 'nullable'],
            'other_expenses' => ['required', 'nullable'],
            'total_of_products' => ['required'],
            'total_sale' => ['required'],
            'notes' => ['required', 'nullable'],

            'output_date' => ['required'],
        ];
    }
}
