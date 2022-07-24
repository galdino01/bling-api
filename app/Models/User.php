<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

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

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function contact() {
        return $this->hasOne(Contact::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function setTypeAttribute($value) {
        $this->attributes['type'] = strtolower($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = str_replace(' ', '_', strtolower($value));
    }

    public function setRgAttribute($value) {
        $this->attributes['rg'] = str_replace('.', '', $value);
    }

    public function setCpfAttribute($value) {
        $this->attributes['cpf'] = str_replace('.', '', $value);
    }

    public function getTypeAttribute() {
        return ucfirst($this->attributes['type']);
    }

    public function getNameAttribute() {
        return ucfirst($this->attributes['name']);
    }

    public function getRgAttribute() {
        return str_replace('-', '.', $this->attributes['rg']);
    }

    public function getCpfAttribute() {
        return str_replace('-', '.', $this->attributes['cpf']);
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

    public function getAddressAttribute() {
        return $this->address()->first();
    }

    public function getContactAttribute() {
        return $this->contact()->first();
    }

    public function getOrdersAttribute() {
        return $this->orders()->get();
    }
}
