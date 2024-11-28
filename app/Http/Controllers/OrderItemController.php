<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Método para mostrar todos los detalles de los pedidos
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return view('order_items.index', compact('orderItems'));
    }

    // Método para mostrar el formulario de creación de detalle de pedido
    public function create()
    {
        return view('order_items.create');
    }

    // Método para almacenar un nuevo detalle de pedido
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        OrderItem::create($request->all());

        return redirect()->route('order_items.index');
    }

    // Método para mostrar un detalle de pedido específico
    public function show(OrderItem $orderItem)
    {
        return view('order_items.show', compact('orderItem'));
    }

    // Método para mostrar el formulario de edición de detalle de pedido
    public function edit(OrderItem $orderItem)
    {
        return view('order_items.edit', compact('orderItem'));
    }

    // Método para actualizar un detalle de pedido
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderItem->update($request->all());

        return redirect()->route('order_items.index');
    }

    // Método para eliminar un detalle de pedido
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order_items.index');
    }
}