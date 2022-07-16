<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'category_id',

        'status',
        'origin',
        'description',
        'brand',
        'price',
        'price_cost',
        'warranty',
        'notes',

        'unit_of_measure',
        'width',
        'height',
        'depth',
        'net_weight',
        'gross_weight',

        'quantity',
        'localization',

        'images',

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

    public static function getCuidPrefix() {
        return 'product|';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);;
    }
}
