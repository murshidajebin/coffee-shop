<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
{
    $orders = Order::with('user')
                ->latest()
                ->get();

    return view('admin.orders.index',compact('orders'));
}

public function updateStatus(Request $request,$id)
{
    $order = Order::findOrFail($id);

    $order->status = $request->status;
    $order->save();

    return back()->with('success','Status Updated');
}
public function show($id)
{
    $order = Order::with('items.product','user')->findOrFail($id);

    return view('admin.orders.show',compact('order'));
}
}
