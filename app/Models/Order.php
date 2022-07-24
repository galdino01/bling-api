<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'user_id',

        'status',
        'discount',
        'cost_of_freight',
        'other_expenses',
        'total_of_products',
        'total_sale',
        'notes',

        'output_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = [
        'output_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class);
    }

    public function setStatusAttribute($value) {
        $this->attributes['status'] = strtolower($value);
    }

    public function setDiscountAttribute($value) {
        $this->attributes['discount'] = str_replace(',', '.', $value);
    }

    public function setCostOfFreightAttribute($value) {
        $this->attributes['cost_of_freight'] = str_replace(',', '.', $value);
    }

    public function setOtherExpensesAttribute($value) {
        $this->attributes['other_expenses'] = str_replace(',', '.', $value);
    }

    public function setTotalOfProductsAttribute($value) {
        $this->attributes['total_of_products'] = str_replace(',', '.', $value);
    }

    public function setTotalSaleAttribute($value) {
        $this->attributes['total_sale'] = str_replace(',', '.', $value);
    }

    public function setNotesAttribute($value) {
        $this->attributes['notes'] = str_replace(' ', '_', $value);
    }

    public function getStatusAttribute() {
        return $this->attributes['status'] ? strtoupper($this->attributes['status']) : null;
    }

    public function getDiscountAttribute() {
        return $this->attributes['discount'] ? str_replace(',', '.', $this->attributes['discount']) : null;
    }

    public function getCostOfFreightAttribute() {
        return $this->attributes['cost_of_freight'] ? str_replace(',', '.', $this->attributes['cost_of_freight']) : null;
    }

    public function getOtherExpensesAttribute() {
        return $this->attributes['other_expanses'] ? str_replace(',', '.', $this->attributes['other_expanses']) : null;
    }

    public function getTotalOfProductsAttribute() {
        return $this->attributes['total_of_products'] ? str_replace(',', '.', $this->attributes['total_of_products']) : null;
    }

    public function getTotalSaleAttribute() {
        return $this->attributes['total_sale'] ? str_replace(',', '.', $this->attributes['total_sale']) : null;
    }

    public function getNotesAttribute() {
        return $this->attributes['notes'] ? str_replace('_', ' ', $this->attributes['notes']) : null;
    }

    public function getOutputDateAttribute() {
        return $this->attributes['output_date'] ? $this->attributes['output_date']->format('d/m/Y H:i:s') : null;
    }

    public function getCreatedAtAttribute() {
        return $this->attributes['created_at'] ? $this->attributes['created_at']->format('d/m/Y H:i:s') : null;
    }

    public function getUpdatedAtAttribute() {
        return $this->attributes['updated_at'] ? $this->attributes['updated_at']->format('d/m/Y H:i:s') : null;
    }

    public function getDeletedAtAttribute() {
        return $this->attributes['deleted_at'] ? $this->attributes['deleted_at']->format('d/m/Y H:i:s') : null;
    }

    public function getTotalAttribute() {
        return $this->total_sale - $this->discount;
    }

    public function getTotalWithFreightAttribute() {
        return $this->total_sale - $this->discount + $this->cost_of_freight;
    }

    public function getTotalWithFreightAndExpensesAttribute() {
        return $this->total_sale - $this->discount + $this->cost_of_freight + $this->other_expenses;
    }
}
