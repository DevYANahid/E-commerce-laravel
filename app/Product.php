<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'sub_category_id', 'name', 'description', 'price', 'discount', 'status', 'slag', 'sku', 'tag_id',
    ];

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function product_colors()
    {
        return $this->hasMany('App\productColor');
    }

    public function product_sizes()
    {
        return $this->hasMany('App\productSize');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
