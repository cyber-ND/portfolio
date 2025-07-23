<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the admin role exists
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create the admin user
        $admin = User::firstOrCreate(
            ['email' => 'ndubuisinwankpa080@gmail.com'],
            [
                'name' => 'ndubuisi nwankpa',
                'password' => Hash::make('ndubu1s1-p0rt'),
            ]
        );

        // Assign the admin role
        $admin->assignRole($adminRole);
    }
}
