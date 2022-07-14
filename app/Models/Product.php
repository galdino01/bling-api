<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'user_id',
        'category_id',

        'gtin_code',
        'gtin_package',
        'cest',

        'status',
        'code',
        'origin',
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

        'quantity',
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
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);;
    }
}
