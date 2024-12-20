<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk mengisi data dummy.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan factory untuk membuat 10 data dummy
        Menu::factory(10)->create(); // Ini akan membuat 10 data secara otomatis
    }
}
