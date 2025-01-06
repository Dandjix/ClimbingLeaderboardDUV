<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // Only require authentication for user-specific data, but allow viewing the page unauthenticated
    }

    public function index()
    {
        // Fetch all climbing blocks
        $blocks = Block::orderBy('name', 'asc')->get();

        // Get the currently logged-in user, or null if not authenticated
        $user = Auth::user();

        // If the user is logged in, fetch their climbed blocks
        $climbedBlocks = [];
        if ($user) {
            $climbedBlocks = $user->blocks()->pluck('blocks.id')->toArray();
        }

        // Get the top users based on the number of blocks they've climbed
        // $topUsers = User::withCount('blocks')
        //                 ->orderBy('blocks_count', 'desc')
        //                 ->take(5)
        //                 ->get();

        $topUsers = User::withCount('blocks')  // Get the block count for each user
        ->leftJoin('climbs', 'users.id', '=', 'climbs.user_id')
        ->leftJoin('blocks', 'climbs.block_id', '=', 'blocks.id')
        ->select('users.*')  // Only select user data
        ->groupBy('users.id')  // Group by user to avoid duplicates
        ->take(5)  // Get the top 5 users
        ->get()
        ->load('blocks')  // Eager load blocks relationship for each user
        ->map(function ($user) {
            // Calculate total score based on the blocks this user has climbed
            $totalScore = $user->blocks->sum(function ($block) {
                return $block->score;  // This will call the getScoreAttribute() method from the Block model
            });
    
            // Add total score to the user object
            $user->total_score = $totalScore;
    
            return $user;
        })
        ->sortByDesc('total_score')  // Sort users by total score in descending order
        ->values()  // Reindex the collection after sorting
        ->map(function ($user, $index) {
            static $lastScore = null;  // Track the score of the previous user
            static $lastRank = 1;  // Track the rank of the previous user
            
            // If the current user's score is the same as the previous one, assign the same rank
            if ($lastScore !== null && $user->total_score == $lastScore) {
                $user->rank = $lastRank;
            } else {
                // Otherwise, assign a new rank based on the current index
                $user->rank = $index + 1;
            }
    
            // Update the last score and rank for the next iteration
            $lastScore = $user->total_score;
            $lastRank = $user->rank;
    
            return $user;
        });
    

        // Return the homepage view with the data
        return view('home', compact('blocks', 'user', 'climbedBlocks', 'topUsers'));
    }
}