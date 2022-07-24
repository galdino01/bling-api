<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model {
    use HasFactory, SoftDeletes, Uuid;

    protected $keyType = 'string';

    protected $fillable = [
        'id',

        'category_id',

        'status',
        'name',
        'origin',
        'brand',
        'price',
        'price_cost',
        'warranty',
        'description',
        'notes',

        'width',
        'height',
        'depth',
        'net_weight',
        'gross_weight',

        'quantity',
        'localization',

        'image',

        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class);;
    }

    public function setStatusAttribute($value) {
        $this->attributes['status'] = strtolower($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = str_replace(' ', '_', strtolower($value));
    }

    public function setOriginAttribute($value) {
        $this->attributes['origin'] = str_replace(' ', '_', strtolower($value));
    }

    public function setBrandAttribute($value) {
        $this->attributes['brand'] = str_replace(' ', '_', strtolower($value));
    }

    public function setPriceAttribute($value) {
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function setPriceCostAttribute($value) {
        $this->attributes['price_cost'] = str_replace(',', '.', $value);
    }

    public function setWarrantyAttribute($value) {
        $this->attributes['warranty'] = str_replace(' ', '_', strtolower($value));
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = str_replace(' ', '_', strtolower($value));
    }

    public function setNotesAttribute($value) {
        $this->attributes['notes'] = str_replace(' ', '_', $value);
    }

    public function setWidthAttribute($value) {
        $this->attributes['width'] = str_replace(',', '.', $value);
    }

    public function setHeightAttribute($value) {
        $this->attributes['height'] = str_replace(',', '.', $value);
    }

    public function setDepthAttribute($value) {
        $this->attributes['depth'] = str_replace(',', '.', $value);
    }

    public function setNetWeightAttribute($value) {
        $this->attributes['net_weight'] = str_replace(',', '.', $value);
    }

    public function setGrossWeightAttribute($value) {
        $this->attributes['gross_weight'] = str_replace(',', '.', $value);
    }

    public function setQuantityAttribute($value) {
        $this->attributes['quantity'] = str_replace(',', '.', $value);
    }

    public function setLocalizationAttribute($value) {
        $this->attributes['localization'] = str_replace('-', '_', strtolower($value));
    }

    public function setImageAttribute($value) {
        $this->attributes['image'] = str_replace(',', '.', $value);
    }

    public function getStatusAttribute() {
        return ucfirst($this->attributes['status']);
    }

    public function getNameAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['name']));
    }

    public function getOriginAttribute() {
        return ucfirst($this->attributes['origin']);
    }

    public function getBrandAttribute() {
        return ucfirst($this->attributes['brand']);
    }

    public function getPriceAttribute() {
        return str_replace('.', ',', $this->attributes['price']);
    }

    public function getPriceCostAttribute() {
        return str_replace('.', ',', $this->attributes['price_cost']);
    }

    public function getWarrantyAttribute() {
        return ucwords(str_replace('_', ' ', $this->attributes['warranty']));
    }

    public function getDescriptionAttribute() {
        return $this->attributes['description'] ? str_replace('_', ' ', $this->attributes['description']) : 'No description';
    }

    public function getNotesAttribute() {
        return $this->attributes['notes'] ? str_replace('_', ' ', $this->attributes['notes']) : 'No notes';
    }

    public function getWidthAttribute() {
        return str_replace('.', ',', $this->attributes['width']);
    }

    public function getHeightAttribute() {
        return str_replace('.', ',', $this->attributes['height']);
    }

    public function getDepthAttribute() {
        return str_replace('.', ',', $this->attributes['depth']);
    }

    public function getNetWeightAttribute() {
        return str_replace('.', ',', $this->attributes['net_weight']);
    }

    public function getGrossWeightAttribute() {
        return str_replace('.', ',', $this->attributes['gross_weight']);
    }

    public function getQuantityAttribute() {
        return str_replace('.', ',', $this->attributes['quantity']);
    }

    public function getLocalizationAttribute() {
        return strtoupper(str_replace('_', '-', $this->attributes['localization']));
    }

    public function getImageUrlAttribute() {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getExpirationDateAttribute() {
        return $this->attributes['expiration_date'] ? Carbon::parse($this->attributes['expiration_date'])->format('d/m/Y H:i:s') : null;
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
