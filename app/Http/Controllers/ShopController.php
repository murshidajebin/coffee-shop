<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    /* ---------------- HOME PAGE (LANDING) ---------------- */
   public function home()
{
    $products = Product::all();
    $categories = Category::all();

    return view('shop.home', compact('products','categories'));
}

    /* ---------------- ALL PRODUCTS (MENU PAGE) ---------------- */
    public function index()
    {
        $products = Product::paginate(12);
        return view('shop.menu', compact('products'));
    }

    /* ---------------- SINGLE PRODUCT PAGE ---------------- */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.product', compact('product'));
    }
}
