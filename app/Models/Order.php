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

        'description',
        'notes',
        'internal_notes',
        'number',
        'order_number',
        'seller',
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
        'created_at',
        'updated_at',
        'deleted_at',
        'output_date'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'idCliente');
    }
}
