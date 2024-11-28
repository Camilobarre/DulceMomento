<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define qué campos son asignables en masa
    protected $fillable = ['name', 'description', 'price', 'stock'];

    // Relación con los detalles de los pedidos
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}