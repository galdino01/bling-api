<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    public function authorize() {
        return false;
    }

    public function rules(){
        return [
            'user_id' => ['required'],
            'category_id' => ['required'],

            'gtin_code' => ['required'],
            'gtin_package' => ['required'],
            'cest' => ['required'],

            'status' => ['required'],
            'code' => ['required'],
            'origin' => ['required'],
            'description' => ['required'],
            'type' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'price_cost' => ['required'],
            'warranty' => ['nullable'],
            'free_shipping' => ['nullable'],
            'notes' => ['nullable'],

            'unit_of_measure' => ['required'],
            'width' => ['required'],
            'height' => ['required'],
            'depth' => ['required'],
            'net_weight' => ['required'],
            'gross_weight' => ['required'],

            'items_per_box' => ['required'],
            'boxes' => ['required'],
            'localization' => ['required'],

            'image_thumbnail' => ['required', 'nullable'],
            'url_video' => ['required', 'nullable'],

            'expiration_date' => ['required', 'nullable'],
        ];
    }
}
