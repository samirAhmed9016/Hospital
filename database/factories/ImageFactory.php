<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => $this->faker->word() . '.jpg', // Generate a random filename with a .jpg extension
            'imageable_id' => Doctor::all()->random()->id, // Generate a random number for the imageable_id
            'imageable_type' => Doctor::class, // Set a polymorphic type, for example 'Product'
        ];
    }
}
