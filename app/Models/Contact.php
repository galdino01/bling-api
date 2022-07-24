<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function setCellAttribute($value) {
        $this->attributes['cell'] = str_replace(['(', ')', '-'], '', strtolower($value));
    }

    public function setTelephoneAttribute($value) {
        $this->attributes['telephone'] = str_replace(['(', ')', '-'], '', strtolower($value));
    }

    public function getCellAttribute() {
        return '(' . substr($this->attributes['cell'], 0, 2) . ') ' . substr($this->attributes['cell'], 2, 5) . '-' . substr($this->attributes['cell'], 7, 4);
    }

    public function getTelephoneAttribute() {
        return '(' . substr($this->attributes['telephone'], 0, 2) . ') ' . substr($this->attributes['telephone'], 2, 5) . '-' . substr($this->attributes['telephone'], 7, 4);
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
