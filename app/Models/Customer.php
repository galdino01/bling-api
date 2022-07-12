<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'name',
        'cnpj',
        'ie',
        'rg',

        'email',
        'cell',
        'telephone',

        'address',
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

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
