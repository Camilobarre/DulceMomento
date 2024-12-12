<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Customer;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de que existan clientes antes de generar órdenes
        $customers = Customer::all();

        if ($customers->isEmpty()) {
            $this->command->info('No customers found. Please seed the customers table first.');
            return;
        }

        // Crear órdenes con datos ficticios
        $customers->each(function ($customer) {
            Order::factory()->count(5)->create([
                'customer_id' => $customer->id,
            ]);
        });

        // Crear una orden específica (opcional)
        Order::create([
            'customer_id' => $customers->random()->id,
            'status' => 'completed',
            'total_price' => 120.50,
            'order_date' => now()->subDays(2),
        ]);
    }
}