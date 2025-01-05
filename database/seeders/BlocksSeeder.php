<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlocksSeeder extends Seeder
{
    public function run()
    {
        // Creating sample blocks
        Block::create([
            'name' => 'Block 1',
            'difficulty' => 3,
            'description' => 'A relatively easy block for beginners.',
        ]);

        Block::create([
            'name' => 'Block 2',
            'difficulty' => 5,
            'description' => 'A challenging block for experienced climbers.',
        ]);

        Block::create([
            'name' => 'Block 3',
            'difficulty' => 7,
            'description' => 'A very difficult block requiring expert skill.',
        ]);
    }
}
