<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de que existan órdenes y productos antes de generar ítems
        $orders = Order::all();
        $products = Product::all();

        if ($orders->isEmpty() || $products->isEmpty()) {
            $this->command->info('No orders or products found. Please seed the orders and products tables first.');
            return;
        }

        // Crear ítems para cada orden
        $orders->each(function ($order) use ($products) {
            OrderItem::factory()->count(3)->create([
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
            ]);
        });

        // Crear ítems específicos (opcional)
        OrderItem::create([
            'order_id' => $orders->random()->id,
            'product_id' => $products->random()->id,
            'quantity' => 2,
            'price' => 50.00,
        ]);
    }
}