<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productSize extends Model
{
    protected $fillable = [
      'product_id', 'size', 'size_price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
