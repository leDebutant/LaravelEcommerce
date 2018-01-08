<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getPath()
    {
        return "uploads/".$this->picture;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function commandeproducts()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
