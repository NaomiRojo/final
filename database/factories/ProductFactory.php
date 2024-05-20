<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {

        $name = $this->faker->unique()->words(3, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'details' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'shipping_cost' => $this->faker->randomFloat(2, 5, 20),
            'description' => $this->faker->paragraph,
            'category_id' => $this->faker->numberBetween(1, 10),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'image_path' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
