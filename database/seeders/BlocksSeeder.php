<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class BlocksSeeder extends Seeder
{
    public function run()
    {
        $blocks = [
            ['name' => 'Block 1', 'difficulty' => 3, 'description' => 'A relatively easy block for beginners.'],
            ['name' => 'Block 2', 'difficulty' => 5, 'description' => 'A challenging block for experienced climbers.'],
            ['name' => 'Block 3', 'difficulty' => 7, 'description' => 'A very difficult block requiring expert skill.'],
            ['name' => 'Block 4', 'difficulty' => 2, 'description' => 'A gentle introduction to climbing.'],
            ['name' => 'Block 5', 'difficulty' => 4, 'description' => 'A moderate block with a mix of challenges.'],
            ['name' => 'Block 6', 'difficulty' => 6, 'description' => 'A tough block for intermediate climbers.'],
            ['name' => 'Block 7', 'difficulty' => 8, 'description' => 'An advanced block with complex moves.'],
            ['name' => 'Block 8', 'difficulty' => 9, 'description' => 'A block for those seeking a real test of skill.'],
            ['name' => 'Block 9', 'difficulty' => 1, 'description' => 'Perfect for complete beginners.'],
            ['name' => 'Block 10', 'difficulty' => 5, 'description' => 'A challenging yet achievable block.'],
            ['name' => 'Block 11', 'difficulty' => 3, 'description' => 'Great for building confidence in climbing.'],
            ['name' => 'Block 12', 'difficulty' => 6, 'description' => 'A block designed to push your limits.'],
            ['name' => 'Block 13', 'difficulty' => 7, 'description' => 'Demanding techniques for skilled climbers.'],
            ['name' => 'Block 14', 'difficulty' => 4, 'description' => 'A fun challenge with rewarding moves.'],
            ['name' => 'Block 15', 'difficulty' => 8, 'description' => 'Test your skills on this intricate block.'],
            ['name' => 'Block 16', 'difficulty' => 2, 'description' => 'A relaxed climb to enjoy.'],
            ['name' => 'Block 17', 'difficulty' => 9, 'description' => 'One of the hardest blocks in the series.'],
            ['name' => 'Block 18', 'difficulty' => 5, 'description' => 'A balanced block with varying challenges.'],
            ['name' => 'Block 19', 'difficulty' => 4, 'description' => 'A rewarding block for intermediate climbers.'],
            ['name' => 'Block 20', 'difficulty' => 7, 'description' => 'A true test of climbing prowess.']
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
