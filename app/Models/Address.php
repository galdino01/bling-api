<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use CaliCastle\Concerns\HasCuid;

class Address extends Model {
    use HasFactory, SoftDeletes, HasCuid;

    protected $fillable = [
        'id',

        'user_id',

        'cep',
        'street',
        'number',
        'adjunct',
        'district',
        'city',
        'state',

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
        return 'address|';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
