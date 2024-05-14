<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllCountries extends Model
{
    protected $fillable = [
        'name',
    ];

    public function company()
    {
        return $this->belongsToMany('App\Company');
    }
}
