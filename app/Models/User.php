<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',

        'type',

        'name',
        'ie',

        'cnpj',
        'rg',
        'cpf',

        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
