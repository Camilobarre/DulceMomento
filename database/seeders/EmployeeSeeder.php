<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear empleados con datos ficticios
        Employee::factory()->count(10)->create();

        // Datos específicos (opcional)
        Employee::create([
            'name' => 'Carlos Gómez',
            'email' => 'carlos.gomez@example.com',
            'phone' => '1234567890',
            'position' => 'Manager',
        ]);

        Employee::create([
            'name' => 'Ana Torres',
            'email' => 'ana.torres@example.com',
            'phone' => '0987654321',
            'position' => 'Cashier',
        ]);
    }
}