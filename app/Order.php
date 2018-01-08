<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function commandeproducts()
    {
        return $this->hasMany('App\OrderProduct');
    }
}
