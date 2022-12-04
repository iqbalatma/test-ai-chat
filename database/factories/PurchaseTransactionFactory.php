<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1,100),
            'total_spent' => $this->faker->randomNumber(7),
            'total_saving' => $this->faker->randomNumber(4),
            'transaction_at' => $this->faker->date($format='Y-m-d', $max='now')
        ];
    }
}
