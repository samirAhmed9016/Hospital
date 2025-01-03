<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return [
            'name' => $this->faker->name(),  // Generating a random name
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // You can set the default password here
            'phone' => $this->faker->phoneNumber(),
            'price' => $this->faker->randomFloat(2, 100, 500), // Random price between 50 and 500
            'appointments' => $this->faker->randomElement($daysOfWeek), // Random day for appointment
            'section_id' => Section::all()->random()->id,


        ];
    }
}
