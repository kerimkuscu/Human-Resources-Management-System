<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        UserRole::create([
            'users_role' => 'Admin',
        ]);

        UserRole::create([
            'users_role' => 'Arge',
        ]);

        UserRole::create([
            'users_role' => 'Support',
        ]);
    }
}
