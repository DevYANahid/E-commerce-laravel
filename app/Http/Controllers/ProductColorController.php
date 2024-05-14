<?php

namespace App\Http\Controllers;

use App\productColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function ajaxShow(productColor $color)
    {
        return response()->json($color);
    }
}
