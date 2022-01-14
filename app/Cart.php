<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id','product_qty', 'price', 'user_ip',
    ];

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    // public function category(){
    //     return $this->hasMany('App\Category');
    // }
}
