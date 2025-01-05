<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Creating basic roles
        Role::create(['role_name' => 'Admin']);
        Role::create(['role_name' => 'User']);
    }
}