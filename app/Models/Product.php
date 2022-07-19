<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'category_id',

        'status',
        'name',
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

    public function setPriceAttribute($value) {
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function setPriceCostAttribute($value) {
        $this->attributes['price_cost'] = str_replace(',', '.', $value);
    }

    public function getPriceAttribute() {
        return str_replace('.', ',', $this->attributes['price']);
    }

    public function getPriceCostAttribute() {
        return str_replace('.', ',', $this->attributes['price_cost']);
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
