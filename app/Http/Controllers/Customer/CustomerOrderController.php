<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',Auth::id())
                        ->latest()
                        ->get();

        return view('customer.orders',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product')
                    ->where('user_id',Auth::id())
                    ->findOrFail($id);

        return view('customer.order-details',compact('order'));
    }
}
