<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $year = $this->faker->numberBetween(2018, date('Y'));

    // Generate a random three-digit number
    $number = $this->faker->unique()->numberBetween(1, 200);

    // Ensure the number is padded with zeros if it's less than 100
    $number = str_pad($number, 3, '0', STR_PAD_LEFT);

    // Combine the parts to form the desired pattern
    $pattern = "CS/$year/$number";
        return [
            'matric_no' => $pattern,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => $this->faker->password(6, 8),
            'level' => $this->faker->regexify('[1-4]{1}[0]{2}'),
        ];
    }
}
