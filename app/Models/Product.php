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
        'supplier_id',
        'category_id',

        'gtin_code',
        'gtin_package',
        'cest',

        'status',
        'code',
        'description',
        'type',
        'brand',
        'price',
        'price_cost',
        'warranty',
        'free_shipping',
        'notes',

        'unit_of_measure',
        'width',
        'height',
        'depth',
        'net_weight',
        'gross_weight',

        'items_per_box',
        'boxes',
        'localization',

        'image_thumbnail',
        'url_video',

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

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class);
    }

    public function product_group() {
        return $this->belongsTo(ProductGroup::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
