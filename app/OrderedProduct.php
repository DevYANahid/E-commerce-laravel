<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    protected $fillable = [
        'customers_orders_id', 'name', 'qty', 'image', 'price'
    ];

    public function customers_orders()
    {
        return $this->belongsTo('App\CustomersOrders');
    }

    public function ordered_products_attributes()
    {
        return $this->hasMany('App\OrderedProductAttribute');
    }
}
