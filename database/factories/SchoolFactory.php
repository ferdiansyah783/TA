<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['swasta', 'negeri']),
            'major' => $this->faker->randomElement(['IPA', 'IPS', 'IPC', 'IPB', 'IPD', 'RPL', 'TKJ']),
        ];
    }
}
