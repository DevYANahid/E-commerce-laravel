<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'number', 'type',
    ];

    public function company()
    {
        $this->belongsToMany('App\Company');
    }
}
