<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'user_id', 'category_name', 'status',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
