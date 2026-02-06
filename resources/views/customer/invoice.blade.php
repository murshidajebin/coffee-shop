<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<style>
body{
    font-family: DejaVu Sans;
    font-size: 14px;
}
.header{
    text-align:center;
    margin-bottom:20px;
}
.box{
    border:1px solid #ddd;
    padding:15px;
}
.table{
    width:100%;
    border-collapse:collapse;
}
.table th, .table td{
    border:1px solid #ddd;
    padding:8px;
}
.table th{
    background:#f5f5f5;
}
.total{
    text-align:right;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="header">
    <h2>☕ Brew & Bean</h2>
    <p>Thank you for your order</p>
</div>

<div class="box">
    <p><strong>Invoice:</strong> {{ $order->order_code }}</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
    <p><strong>Payment:</strong> {{ strtoupper($order->payment_method) }}</p>
</div>

<br>

<table class="table">
<thead>
<tr>
    <th>Item</th>
    <th>Qty</th>
    <th>Price</th>
</tr>
</thead>

<tbody>
@foreach($order->items as $item)
<tr>
   <td>{{ $item->product->name ?? 'Product Deleted' }}</td>

    <td>{{ $item->qty }}</td>
   <td>₹{{ number_format($item->price,2) }}</td>
</tr>
@endforeach
</tbody>
</table>

<br>

<p class="total">Subtotal: ₹{{ $order->subtotal }}</p>
<p class="total">Delivery: ₹{{ $order->delivery }}</p>
<p class="total">Total: ₹{{ $order->total }}</p>

<br>

<p style="text-align:center">
    ❤️ Crafted with love & coffee
</p>

</body>
</html>
