<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'user_id',

        'number',

        'status',
        'discount',
        'cost_of_freight',
        'other_expenses',
        'total_of_products',
        'total_sale',
        'notes',

        'output_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'output_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class);
    }
}
