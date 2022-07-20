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
        'brand',
        'price',
        'price_cost',
        'warranty',
        'description',
        'notes',

        'width',
        'height',
        'depth',
        'net_weight',
        'gross_weight',

        'quantity',
        'localization',

        'image',

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

    public function setNameAttribute($value) {
        $this->attributes['name'] = str_replace(' ', '_', strtolower($value));
    }

    public function setPriceAttribute($value) {
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function setPriceCostAttribute($value) {
        $this->attributes['price_cost'] = str_replace(',', '.', $value);
    }

    public function setWarrantyAttribute($value) {
        $this->attributes['warranty'] = str_replace(' ', '_', strtolower($value));
    }

    public function getNameAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['name']));
    }

    public function getPriceAttribute() {
        return str_replace('.', ',', $this->attributes['price']);
    }

    public function getPriceCostAttribute() {
        return str_replace('.', ',', $this->attributes['price_cost']);
    }

    public function getWarrantyAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['warranty']));
    }

    public function getStatusAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['status']));
    }

    // TODO: CONTINUAR OS GETTERS AND SETTERS

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);;
    }
}
