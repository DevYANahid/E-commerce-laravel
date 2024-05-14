<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialShareLinks extends Model
{
    protected $fillable = [
        'name', 'url',
    ];
}
