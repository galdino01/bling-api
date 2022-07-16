<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use CaliCastle\Concerns\HasCuid;

class User extends Model {
    use HasFactory, SoftDeletes, HasCuid;

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

    public static function getCuidPrefix() {
        return 'user|';
    }

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
