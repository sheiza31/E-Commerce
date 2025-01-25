<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = "cart";
    protected $guarded = [];


    public function products()  {
        return $this->belongsTo(Products::class,'product_id');
    }
}
