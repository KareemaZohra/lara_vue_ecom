<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_model;
use DB;

class ProductController extends Controller
{
    public function show($id)
    {
        $item = Product_model::query()->where('id', $id)->first();

        $sizes = DB::table('variants_models')
            ->select('size')
            ->groupBy('size')
            ->where('product_id', $id)
            ->get();

        $colors = DB::table('variants_models')
            ->select('color')
            ->groupBy('color')
            ->where('product_id', $id)
            ->get();

        return view('single-product',compact('item','sizes','colors'));
    }
}
