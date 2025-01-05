<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('role_name', 'Admin')->first();
        $userRole = Role::where('role_name', 'User')->first();

        // Assigning the 'Admin' role to the first user and 'User' role to the others
        $adminUser = User::where('email', 'admin@example.com')->first();
        $adminUser->roles()->attach($adminRole);

        $regularUsers = User::where('email', '!=', 'admin@example.com')->get();
        foreach ($regularUsers as $user) {
            $user->roles()->attach($userRole);
        }
    }
}
