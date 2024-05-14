<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
      'address', 'phone', 'email',
    ];
}
