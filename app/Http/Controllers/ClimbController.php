<?php

namespace App\Http\Controllers;

use App\Models\Climb;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClimbController extends Controller
{
    /**
     * Toggle whether a user has climbed the block.
     *
     * @param  int  $blockId
     * @return \Illuminate\Http\Response
     */
    public function toggleClimb($blockId)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the block by ID
        $block = Block::find($blockId);

        // If block does not exist, return an error
        if (!$block) {
            return redirect()->back()->with('error', 'Block not found.');
        }

        // Check if the user has already climbed the block
        $climb = $user->blocks()->where('block_id', $block->id)->first();

        if ($climb) {
            // If the user has already climbed the block, remove the climb (unmark)
            $user->blocks()->detach($block->id);
            return redirect()->back()->with('message', 'Block unmarked successfully.');
        } else {
            // If the user has not climbed the block yet, add the climb (mark)
            $user->blocks()->attach($block->id);
            return redirect()->back()->with('message', 'Block marked successfully.');
        }
    }
}