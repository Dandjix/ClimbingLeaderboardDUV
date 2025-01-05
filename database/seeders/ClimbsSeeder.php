<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Block;

class ClimbsSeeder extends Seeder
{
    public function run()
    {
        // Simulating climbs
        $user1 = User::where('email', 'john@example.com')->first();
        $user2 = User::where('email', 'jane@example.com')->first();

        // John climbs Block 1 and Block 2
        $block1 = Block::where('name', 'Block 1')->first();
        $block2 = Block::where('name', 'Block 2')->first();
        $user1->blocks()->attach([$block1->id, $block2->id]);

        // Jane climbs Block 2 and Block 3
        $block3 = Block::where('name', 'Block 3')->first();
        $user2->blocks()->attach([$block2->id, $block3->id]);
    }
}