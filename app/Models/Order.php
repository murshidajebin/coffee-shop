<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

protected $fillable = [
    'user_id',
    'order_code',
    'subtotal',
    'delivery',
    'total',
    'status',
    'payment_method'
];
    // protected $fillable = ['customer_name', 'customer_email', 'customer_address', 'total_amount', 'status'];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
    
}
