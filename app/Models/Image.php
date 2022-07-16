<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use CaliCastle\Concerns\HasCuid;

class Image extends Model {
    use HasFactory, SoftDeletes, HasCuid;

    protected $fillable = [
        'id',

        'product_id',

        'name',
        'path',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function getCuidPrefix() {
        return 'image|';
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
