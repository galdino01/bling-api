<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'order_id',

        'code',
        'name',
        'description',

        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
