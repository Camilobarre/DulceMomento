<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = \App\Models\Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'status' => $this->faker->randomElement(['pending', 'completed', 'canceled']),
            'total_price' => $this->faker->randomFloat(2, 10, 500),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}