<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model {
    use HasFactory, SoftDeletes, Uuid;

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

    public function user() {
        return $this->belongsTo(User::class);
    }
}
