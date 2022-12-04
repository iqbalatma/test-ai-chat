<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{

    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(["male", "female", "rather not to say"]),
            'date_of_birth' => $this->faker->date($format='Y-m-d', $max='now'),
            'contact_number'     => $this->faker->phoneNumber(),
            'email' => $this->faker->email()
        ];
    }
}
