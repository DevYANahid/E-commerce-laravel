<?php

namespace App\Http\Controllers;

use App\productSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public function ajaxShow(productSize $size)
    {
        return response()->json($size);
    }
}
