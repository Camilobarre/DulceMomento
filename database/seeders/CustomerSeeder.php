<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear clientes con datos ficticios
        Customer::factory()->count(10)->create();

        // Datos específicos (opcional)
        Customer::create([
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'phone' => '1234567890',
            'preferences' => 'Sin azúcar, pastel de chocolate',
        ]);

        Customer::create([
            'name' => 'María López',
            'email' => 'maria.lopez@example.com',
            'phone' => '0987654321',
            'preferences' => 'Sin gluten, pastel de vainilla',
        ]);
    }
}
