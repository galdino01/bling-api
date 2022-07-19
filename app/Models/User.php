<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'type',
        'name',

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
}
