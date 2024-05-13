<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product; 

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->sentence(3),
            'description' => $faker->paragraph(3),
            'price' => $faker->numberBetween(10, 100),
            'image' => $faker->imageUrl(200, 200, 'products', true),
        ];
    }
}
