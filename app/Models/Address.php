<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'customer_id',

        'street',
        'number',
        'adjunct',
        'city',
        'district',
        'cep',
        'uf',

        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
