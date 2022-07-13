<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->firstName(),
            'l_name' => $this->faker->lastName(),
            'q3' => 'test',
            'q4' => 'Germany',
            'q5' => 'test',
            'q6' => 'test'
        ];
    }
}
