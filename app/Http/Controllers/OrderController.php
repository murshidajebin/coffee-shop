<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CheckoutController extends Controller
{
    public function checkout(Request $request): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'order_code' => 'required|string',
            'subtotal' => 'required|numeric',
            'delivery' => 'required|numeric',
            'total' => 'required|numeric',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            // Add validation for order items if needed
        ]);

        // Create a new order
        $order = Order::create($validatedData);
        return redirect()->route('orders.show', $order->id);
    }
    public function confirm($id)
{
    $order = Order::with('items.product')->findOrFail($id);

    return view('customer.order-confirmed', compact('order'));
}
    }
