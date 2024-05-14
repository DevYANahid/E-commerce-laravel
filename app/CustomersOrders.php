<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersOrders extends Model
{
    protected $fillable = [
        'order_no', 'name', 'email', 'phone', 'address_line1', 'address_line2', 'country', 'city', 'zip', 'payment_type', 'payment_phone', 'payment_ref', 'subtotal', 'tax', 'net_price', 'order_time', 'order_date', 'action_date', 'delivery_day'
    ];

    public function ordered_products()
    {
        return $this->hasMany('App\OrderedProduct');
    }
}
