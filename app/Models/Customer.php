<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Define qué campos son asignables en masa
    protected $fillable = ['name', 'email', 'phone', 'preferences'];

    // Relación con los pedidos (uno a muchos)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
