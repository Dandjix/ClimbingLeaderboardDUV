<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Tristan', 'email' => 'tristan@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Clement', 'email' => 'clems@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Alban', 'email' => 'alban@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Thomas', 'email' => 'thomas@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Carol', 'email' => 'carol@example.com', 'password' => Hash::make('password123')],
            ['name' => 'John Fitzgerald Kennedy', 'email' => 'jfk@president.com', 'password' => Hash::make('password123')],
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('admin123'), 'admin' => true],
            ['name' => 'Emily', 'email' => 'emily@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Michael', 'email' => 'michael@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Sarah', 'email' => 'sarah@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Robert', 'email' => 'robert@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Jessica', 'email' => 'jessica@example.com', 'password' => Hash::make('password123')],
            ['name' => 'William', 'email' => 'william@example.com', 'password' => Hash::make('password123')],
            ['name' => 'Sophia', 'email' => 'sophia@example.com', 'password' => Hash::make('password123')],
            ['name' => 'James', 'email' => 'james@example.com', 'password' => Hash::make('password123')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}