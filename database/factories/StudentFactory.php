<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'course' => $this->faker->word,
        ];
    }
}
