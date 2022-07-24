<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model {
    use HasFactory, SoftDeletes, Uuid;

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

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = str_replace(' ', '_', strtolower($value)) ?: null;
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = str_replace(' ', '_', $value) ?: null;
    }

    public function getNameAttribute($value) {
        return ucwords(str_replace('_', ' ', $value));
    }

    public function getDescriptionAttribute($value) {
        return str_replace('_', ' ', $value);
    }

    public function getCreatedAtAttribute() {
        return $this->attributes['created_at'] ? Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:i:s') : null;
    }

    public function getUpdatedAtAttribute() {
        return $this->attributes['updated_at'] ? Carbon::parse($this->attributes['updated_at'])->format('d/m/Y H:i:s') : null;
    }

    public function getDeletedAtAttribute() {
        return $this->attributes['deleted_at'] ? Carbon::parse($this->attributes['deleted_at'])->format('d/m/Y H:i:s') : null;
    }
}
