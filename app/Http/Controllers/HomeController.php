<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is logged in
    }

    public function index()
    {
        // Fetch all climbing blocks
        $blocks = Block::all();

        // Get the currently logged-in user
        $user = Auth::user();

        // Get the blocks that the user has climbed
        $climbedBlocks = $user->blocks()->pluck('blocks.id')->toArray();

        // Get the top users based on the number of blocks they've climbed
        $topUsers = User::withCount('blocks')
                        ->orderBy('blocks_count', 'desc')
                        ->take(5)
                        ->get();

        // Return the homepage view with the data
        return view('home', compact('blocks', 'user', 'climbedBlocks', 'topUsers'));
    }
}