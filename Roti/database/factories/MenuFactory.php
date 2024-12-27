<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MenuFactory extends Factory
{
    /**
     * Tentukan model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Definisikan model factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5000, 50000),
            'image' => 'gambar/placeholder_image.jpg', 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
