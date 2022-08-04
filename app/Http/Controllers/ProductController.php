<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_model;

class ProductController extends Controller
{
    public function show($id)
    {
        $item = Product_model::query()->where('id', $id)->first();

        return view('single-product',compact('item'));
    }
}
