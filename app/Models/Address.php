<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setCepAttribute($value) {
        $this->attributes['cep'] = str_replace('-', '', $value);
    }

    public function setStreetAttribute($value) {
        $this->attributes['street'] = str_replace(' ', '_', strtolower($value));
    }

    public function setNumberAttribute($value) {
        $this->attributes['number'] = str_replace(' ', '_', strtolower($value));
    }

    public function setAdjunctAttribute($value) {
        $this->attributes['adjunct'] = str_replace(' ', '_', strtolower($value));
    }

    public function setDistrictAttribute($value) {
        $this->attributes['district'] = str_replace(' ', '_', strtolower($value));
    }

    public function setCityAttribute($value) {
        $this->attributes['city'] = str_replace(' ', '_', strtolower($value));
    }

    public function setStateAttribute($value) {
        $this->attributes['state'] = strtolower($value);
    }

    public function getCepAttribute() {
        return preg_replace('/[^0-9]/', '', $this->attributes['cep']);
    }

    public function getStreetAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['street']));
    }

    public function getNumberAttribute() {
        return preg_replace('/[^0-9]/', '', $this->attributes['number']);
    }

    public function getAdjunctAttribute() {
        return ucwords($this->attributes['adjunct']);
    }

    public function getDistrictAttribute() {
        return ucwords($this->attributes['district']);
    }

    public function getCityAttribute() {
        return ucwords($this->attributes['city']);
    }

    public function getStateAttribute() {
        return strtoupper($this->attributes['state']);
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

    public function getFullAddressWithCepAttribute() {
        return "{$this->street}, {$this->number} - {$this->adjunct} - {$this->district} - {$this->city} - {$this->state} - {$this->cep}";
    }
}
