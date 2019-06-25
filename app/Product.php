<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'categories'
    ];

    public function country() {
        return $this->hasOne('App\ProductCountry', 'country_id');
    }

    public function categories() {
        return $this->hasMany('App\ProductCategory', 'category_id');
    }

}
