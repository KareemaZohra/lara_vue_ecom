<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HeadermenuComposer
{
    public function CartCount(){
        $CC = DB::table('carts')
            ->sum('quantity');
        return $CC;
    }

    public function compose(View $view){
       $view->with('cartCount', $this->CartCount());
    }
}
