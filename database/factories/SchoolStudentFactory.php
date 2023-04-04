<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SchoolCity;
class SchoolStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nom' => $this->faker->name,
        'adresse' => $this->faker->address,
        'phone' => $this->faker->phoneNumber,
        'email' => $this->faker->unique()->safeEmail(),
        'date_naissance' => $this->faker->date,
        'ville_id' => $this->faker->randomElement(\App\Models\SchoolCity::pluck('id')->toArray())
        ];
    }
}
