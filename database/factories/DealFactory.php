<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::find(rand(1,18)),
            'title' => fake()->text(20),
            'type'  => 'promotion',
            'is_active' => fake()->boolean(),
            'active_from' => null,
            'active_to' => null,
            'updated_at' =>  now(),
            'created_at' =>  now(),
        ];
    }
}
