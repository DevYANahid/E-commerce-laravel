<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSupport extends Model
{
    protected $fillable = [
      'phone1', 'phone2', 'email',
    ];
}
