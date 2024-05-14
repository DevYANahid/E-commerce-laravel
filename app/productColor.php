<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productColor extends Model
{
    protected $fillable = [
      'product_id', 'color_code', 'color_name', 'color_price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
