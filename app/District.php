<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $fillable = [
        'district_name', 'division_id',
    ];
    public function division()
    {
      return $this->belongsTo(Division::class);
    }
}
