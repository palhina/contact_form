<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'fullname' => $this->faker->name(),
        'gender' => $this->faker->randomElement(['男性','女性']),
        'email' => $this->faker->safeEmail(),
        'postcode' => $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
        'address' => $this->faker->address(),
        'building_name' => $this->faker->secondaryAddress(),
        'opinion' => $this->faker->realText(120),
        ];
    }
}
