<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk mengisi data dummy.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan factory untuk membuat 2 data user otomatis
        User::factory(2)->create();
    }
}
