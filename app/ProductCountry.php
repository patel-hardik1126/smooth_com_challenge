<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCountry extends Model
{
    protected $table = 'products_countries';
     public function country()
    {
        return $this->hasOne('App\Country','id');
    }
}
