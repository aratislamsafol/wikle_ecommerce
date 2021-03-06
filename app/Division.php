<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'division_name', 'priority',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
