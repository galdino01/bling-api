<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'manufacturer_id',
        'product_group_id',
        'provider_id',
        'category_id',

        'gtin_code',
        'gtin_package',

        'code',
        'description',
        'type',
        'situation',
        'brand',
        'unity',
        'price',
        'price_cost',
        'short_description',
        'supp_description',
        'tax_class',
        'cest',
        'origin',
        'external_link',
        'notes',
        'warranty',
        'net_weight',
        'gross_weight',
        'min_stock',
        'max_stock',

        'product_width',
        'product_height',
        'product_depth',
        'unit_of_measure',
        'items_per_box',
        'volumes',
        'localization',
        'cross_docking',
        'status',
        'free_shipping',
        'production',
        'sped_item_type',

        'image_thumbnail',
        'url_video',

        'inclusion_date',
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'inclusion_date',
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
