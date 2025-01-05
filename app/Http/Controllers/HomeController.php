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
        $blocks = Block::all();

        // Get the currently logged-in user, or null if not authenticated
        $user = Auth::user();

        // If the user is logged in, fetch their climbed blocks
        $climbedBlocks = [];
        if ($user) {
            $climbedBlocks = $user->blocks()->pluck('blocks.id')->toArray();
        }

        // Get the top users based on the number of blocks they've climbed
        $topUsers = User::withCount('blocks')
                        ->orderBy('blocks_count', 'desc')
                        ->take(5)
                        ->get();

        // Return the homepage view with the data
        return view('home', compact('blocks', 'user', 'climbedBlocks', 'topUsers'));
    }
}