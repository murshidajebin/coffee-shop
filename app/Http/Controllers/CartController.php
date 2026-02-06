<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
public function add($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['qty']++;
    } else {
        $cart[$id] = [
            'name'  => $product->name,
            'price' => $product->price,
            'qty'   => 1,
            'image' => $product->image ?? null
        ];
    }

    session()->put('cart', $cart);

    return back();
}
public function increase($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['qty']++;
        }
        session()->put('cart', $cart);
        return back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            if($cart[$id]['qty'] > 1){
                $cart[$id]['qty']--;
            } else {
                unset($cart[$id]);
            }
        }
        session()->put('cart', $cart);
        return back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return back();
    }
}