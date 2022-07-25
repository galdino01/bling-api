<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ];
    }

    public function messages() {
        return [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be :max characters.',
        ];
    }
}
