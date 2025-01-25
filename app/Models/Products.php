<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $guarded = [];

public function orders()  {
    return $this->hasMany(Orders::class,'product_id');
}
    public function categories()  {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function carts()  {
        return $this->hasMany(Carts::class,'product_id');
    }
}
