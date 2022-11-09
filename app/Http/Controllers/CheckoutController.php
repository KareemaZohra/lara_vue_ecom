<?php

namespace App\Http\Controllers;

use App\Product_model;
use Illuminate\Http\Request;
use DB;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = DB::table('carts')
            ->select('*')
            ->get();

        $cartTotal = 0;
        foreach($cart as $item){
            $cartTotal += $item->price*$item->quantity;
        }

        return view('checkout',compact('cart','cartTotal'));
    }
}
