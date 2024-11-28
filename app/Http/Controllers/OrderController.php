<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Método para mostrar todos los pedidos
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    // Método para mostrar el formulario de creación de pedido
    public function create()
    {
        return view('orders.create');
    }

    // Método para almacenar un nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
            'total_price' => 'required|numeric',
            'order_date' => 'required|date',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index');
    }

    // Método para mostrar un pedido específico
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Método para mostrar el formulario de edición de pedido
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Método para actualizar un pedido
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|in:pending,completed,cancelled',
            'total_price' => 'required|numeric',
            'order_date' => 'required|date',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index');
    }

    // Método para eliminar un pedido
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}