<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model {
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'id',

        'code',
        'name',

        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
