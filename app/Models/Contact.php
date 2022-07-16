<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'user_id',

        'email',
        'cell',
        'telephone',

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
        return 'contact|';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
