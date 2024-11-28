<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para mostrar todos los productos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Método para mostrar el formulario de creación de producto
    public function create()
    {
        return view('products.create');
    }

    // Método para almacenar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    // Método para mostrar un producto específico
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Método para mostrar el formulario de edición de producto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Método para actualizar un producto
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    // Método para eliminar un producto
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}