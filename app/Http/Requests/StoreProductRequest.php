<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    public function authorize() {
        return false;
    }

    public function rules(){
        return [
            'manufacturer_id' => ['required'],
            'product_group_id' => ['required'],
            'supplier_id' => ['required'],
            'category_id' => ['required'],
            'gtin_code' => ['required'],
            'gtin_package' => ['required'],
            'code' => ['required'],
            'description' => ['required'],
            'type' => ['required'],
            'situation' => ['required'],
            'brand' => ['required'],
            'unity' => ['required'],
            'price' => ['required'],
            'price_cost' => ['required'],
            'short_description' => ['required'],
            'supp_description' => ['required'],
            'tax_class' => ['required'],
            'cest' => ['required'],
            'origin' => ['required'],
            'external_link' => ['required'],
            'notes' => ['required', 'nullable'],
            'warranty' => ['required', 'nullable'],
            'net_weight' => ['required'],
            'gross_weight' => ['required'],
            'min_stock' => ['required'],
            'max_stock' => ['required'],
            'product_width' => ['required'],
            'product_height' => ['required'],
            'product_depth' => ['required'],
            'unit_of_measure' => ['required'],
            'items_per_box' => ['required'],
            'volumes' => ['required'],
            'localization' => ['required'],
            'cross_docking' => ['required'],
            'status' => ['required'],
            'free_shipping' => ['required'],
            'production' => ['required'],
            'sped_item_type' => ['required'],
            'image_thumbnail' => ['required', 'nullable'],
            'url_video' => ['required', 'nullable'],
            'expiration_date' => ['required']
        ];
    }
}
