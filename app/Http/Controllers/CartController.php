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

       $totalInv = array_column($inventory->toArray(), 'quantity');

        $total = 0;
        foreach($totalInv as $inv){
            $total+=$inv;
        }
        return $total;
    }

    public function updateInventory($qty,$id){

        $available_inventory = DB::table('product_models')
            ->where('id', '=', $id)
            ->first()
            ->available;

        $new_inventory = $available_inventory-$qty;

        DB::table('product_models')
            ->where('id', '=', $id)
            ->update(['available'=>$new_inventory]);

    }

    public function add(Request $request){
        $input = $request->all();

        $inv = $this->checkInventory($input['itemId'],$input['itemColor'],$input['itemSize']);

        if($inv<$input['itemQty']){
            return false;
        }
        else{
            DB::table('carts')->insert([
                'itemid' => $input['itemId'],
                'name' => $input['itemName'],
                'price' => $input['itemPrice'],
                'size' => $input['itemSize'],
                'color' => $input['itemColor'],
                'quantity' => $input['itemQty']
            ]);
            $this->updateInventory($input['itemQty'],$input['itemId']);
        }

    }

    public function delete($id){
        DB::table('carts')->where('id', '=', $id)->delete();
    }

    public function update(Request $request){
        $input = $request->all();
        $itemId = DB::table('carts')
                    ->where('id', '=', $input['id'])
                    ->first()
                    ->itemid;

        $inv = $this->checkInventory($itemId,$input['color'],$input['size']);

        if($inv<$input['quantity']){
            return false;
        }
        else{
            DB::table('carts')
                ->where('id', '=', $input['id'])
                ->update(['quantity'=>$input['quantity']]);
        }
    }

}
