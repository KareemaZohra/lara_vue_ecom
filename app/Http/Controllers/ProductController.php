<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_model;
use App\Variants_model;

class ProductController extends Controller
{
    public function show($id)
    {
        $item = Product_model::query()->where('id', $id)->first();

        $sizeGroup = Variants_model::query()
            ->select('size')
            ->groupBy('size')
            ->where('product_id', $id)
            ->get();

        $colorGroup = Variants_model::query()
            ->select('color')
            ->groupBy('color')
            ->where('product_id', $id)
            ->get();
        $sizes = array_column( $sizeGroup->toArray(), 'size');
        $colors = array_column( $colorGroup->toArray(), 'color');

       //dd($colors, $colorsArr->toArray());

        return view('single-product',compact('item','sizes','colors'));
    }
}
