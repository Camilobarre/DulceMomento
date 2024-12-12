<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear productos con la factory
        Product::factory()->count(15)->create();

        // Crear productos específicos (opcional)
        Product::create([
            'name' => 'Premium Chocolate Cake',
            'description' => 'A luxurious chocolate cake with layers of rich ganache.',
            'price' => 25.99,
            'stock' => 10,
        ]);

        Product::create([
            'name' => 'Vanilla Cupcakes',
            'description' => 'Delicious vanilla cupcakes topped with creamy frosting.',
            'price' => 3.50,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Strawberry Cheesecake',
            'description' => 'A creamy cheesecake with fresh strawberry topping.',
            'price' => 18.75,
            'stock' => 20,
        ]);
    }
}
