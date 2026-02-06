<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use PDF;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
  public function checkout(Request $request)
{
    $cart = session('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Cart is empty');
    }

    $subtotal = 0;

    foreach ($cart as $item) {

        // SAFETY CHECK (prevents crashes)
        if (!is_array($item)) {
            continue;
        }

        $subtotal += $item['price'] * $item['qty'];
    }

    $delivery = 50;
    $total = $subtotal + $delivery;

    $order = Order::create([
        'user_id'        => auth()->id(),
        'order_code'     => 'ORD-' . strtoupper(uniqid()),
        'subtotal'       => $subtotal,
        'delivery'       => $delivery,
        'total'          => $total,
        'product_name' => $item['name'], 
        'status'         => 'pending',
        'payment_method' => $request->payment_method ?? 'cod',
         'qty' => $item['qty']
    ]);

    session()->forget('cart');

    return redirect()->route('order.confirm', $order->id);
}

public function invoice(Order $order)
{
    // Security check
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    $pdf = Pdf::loadView('customer.invoice', compact('order'))
              ->setPaper('A4');

    return $pdf->download('Invoice-'.$order->order_code.'.pdf');
}
public function orderConfirm(Order $order)
{
    // Security check
    if ($order->user_id !== auth()->id()) {
        abort(403);
    }

    return view('customer.order-confirmed', compact('order'));
}
}