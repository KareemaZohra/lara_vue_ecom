<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_model;

class ProductListController extends Controller
{
    public function show()
    {
        $data=Product_model::all();
        return view('product-list', compact('data'));
    }
}
