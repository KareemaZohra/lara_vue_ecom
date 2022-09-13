<?php

namespace App\Http\Controllers;

use App\Product_model;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show($id)
    {
        return view('checkout');
    }
}
