<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Block;

class ClimbsSeeder extends Seeder
{
    public function run()
    {
        // Fetch all users and blocks
        $users = User::all();
        $blocks = Block::all();

        // Ensure there are enough users and blocks
        if ($users->isEmpty() || $blocks->isEmpty()) {
            return;
        }

        // Generate 50 climbs
        for ($i = 0; $i < 100; $i++) {
            $randomUser = $users->random();
            $randomBlock = $blocks->random();

            // Attach the block to the user if not already climbed
            if (!$randomUser->blocks->contains($randomBlock->id)) {
                $randomUser->blocks()->attach($randomBlock->id);
            }
        }
    }
}