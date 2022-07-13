<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest {
    public function authorize() {
        return false;
    }

    public function rules() {
        return [
            'customer_id' => ['required'],
            'discount' => ['required', 'nullable'],
            'notes' => ['required', 'nullable'],
            'internal_notes' => ['required', 'nullable'],
            'number' => ['required'],
            'order_number' => ['required'],
            'cost_of_freight' => ['required'],
            'other_expenses' => ['required', 'nullable'],
            'total_of_products' => ['required'],
            'total_sale' => ['required'],
            'status' => ['required'],
            'output_date' => ['required']
        ];
    }
}
