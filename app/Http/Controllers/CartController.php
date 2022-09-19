<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('cart-view');
    }
    public function add(Request $request){
        $input = $request->all();

        DB::table('carts')->insert([
            'itemid' => $input['itemId'],
            'name' => $input['itemName'],
            'price' => $input['itemPrice'],
            'size' => $input['itemSize'],
            'color' => $input['itemColor'],
            'quantity' => $input['itemQty']
        ]);
    }
}
