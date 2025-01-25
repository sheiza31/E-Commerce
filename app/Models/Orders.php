<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $guarded = [];
   
    public function products()  {
        return $this->belongsTo(Products::class,'product_id');
    }

    public function users()  {
        return $this->belongsTo(Users::class,'user_id');
    }
}
