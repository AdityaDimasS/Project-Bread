<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role jika belum ada
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $user = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Membuat permission jika belum ada
        $viewPost = Permission::firstOrCreate(['name' => 'view post']);
        $editPost = Permission::firstOrCreate(['name' => 'edit post']);

        // Menetapkan permission ke role
        $admin->givePermissionTo($viewPost, $editPost);
        $user->givePermissionTo($viewPost);
    }
}
