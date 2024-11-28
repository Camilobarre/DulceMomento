<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Definir qué campos son asignables en masa
    protected $fillable = ['customer_id', 'status', 'total_price', 'order_date'];

    // Relación con el cliente
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relación con los productos a través de OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
