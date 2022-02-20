<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
           'user_id' => rand(1, 4),
           'dtOfAppointment' => now(),
           'field' => $this->faker->randomElement(['tech', 'marketing','hr','caerrer','basic','hacking']),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['cancel','done','comfirm','unfinished','pending','not_comfirm'])
           
        ];
    }
}
