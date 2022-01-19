<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'product_id','user_id',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
