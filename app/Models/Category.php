<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

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

    public static function getCuidPrefix() {
        return 'category|';
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
