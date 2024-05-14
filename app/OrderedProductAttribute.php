<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProductAttribute extends Model
{
    protected $fillable = [
        'ordered_product_id', 'color_code', 'color_name', 'size'
    ];

    public function ordered_product()
    {
        return $this->belongsTo('App\OrderedProduct');
    }
}
