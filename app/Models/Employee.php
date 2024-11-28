<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Definir qué campos son asignables en masa
    protected $fillable = ['name', 'email', 'phone', 'position'];

    // Relación con los pedidos (uno a muchos)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}