<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // CUSTOMER HOME PAGE
    public function home(){
        $products = Product::latest()->take(6)->get();
        return view('customer.home',compact('products'));
    }

    // CUSTOMER DASHBOARD (ORDERS PAGE)
    public function dashboard(){
        return view('customer.dashboard');
    }
  public function index(Request $request)
{
    $categories = Category::all();

    $products = Product::when($request->category,function($q) use ($request){
        $q->where('category_id',$request->category);
    })->get();

    $orders = Order::where('user_id',auth()->id())->latest()->get();

    return view('customer.dashboard',compact('products','categories','orders'));
}
}

