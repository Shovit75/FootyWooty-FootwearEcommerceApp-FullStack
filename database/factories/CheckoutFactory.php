<?php

namespace Database\Factories;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckoutFactory extends Factory
{
    protected $model = Checkout::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'order' => json_encode([
                'items' => [
                    ['product_id' => $this->faker->randomNumber(), 'quantity' => $this->faker->randomDigit()],
                ],
                'total' => $this->faker->randomFloat(2, 10, 100),
            ]),
            'total' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
