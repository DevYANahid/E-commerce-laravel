<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name', 'index', 'category_slag',
    ];

    public function subcotegorise()
    {
        return $this->hasMany('App\SubCategory');
    }
}
