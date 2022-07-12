<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'customer_id',

        'discount',
        'notes',
        'internal_notes',
        'number',
        'order_number',
        'cost_of_freight',
        'other_expenses',
        'total_of_products',
        'total_sale',
        'status',

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

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function seller() {
        return $this->hasOne(Seller::class);
    }
}
