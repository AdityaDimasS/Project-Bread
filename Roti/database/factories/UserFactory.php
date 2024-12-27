<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Tentukan model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Definisikan model factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Nama acak
            'email' => $this->faker->unique()->safeEmail, // Email acak yang unik
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Password yang sudah di-hash
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
