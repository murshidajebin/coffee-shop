<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
   public function index()
{
    $revenue = Order::sum('total');
    $orders = Order::count();
    $pending = Order::where('status','Pending')->count();
    $products = Product::count();

    $recentOrders = Order::latest()->take(5)->get();
    $popular = Product::take(5)->get(); // later we add real sales logic

    return view('admin.dashboard', compact(
        'revenue','orders','pending','products','recentOrders','popular'
    ));
}
}
