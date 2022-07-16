<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use CaliCastle\Concerns\HasCuid;

class OrderProduct extends Pivot {
    use HasFactory, SoftDeletes, HasCuid;

    protected $fillable = [
        'id',

        'order_id',
        'product_id',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function getCuidPrefix() {
        return 'order_product|';
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
