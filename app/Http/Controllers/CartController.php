<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = DB::table('carts')
            ->select('*')
            ->get();

        return view('cart-view',compact('cart'));
    }

    public function checkInventory($id,$color,$size){
        $inventory = DB::table('variants_models')
                    ->select('quantity')
                    ->where('product_id', $id)
                    ->where('color', $color)
                    ->where('size', $size)
                    ->get();

        return $inventory;
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

    public function delete($id){
        DB::table('carts')->where('id', '=', $id)->delete();
    }

    public function update(Request $request){
        $input = $request->all();
        DB::table('carts')
            ->where('id', '=', $input['id'])
            ->update(['quantity'=>$input['quantity']]);
    }

}
