<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Show the authenticated user's account page.
     */
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Pass user data to the view
        return view('account', compact('user'));
    }
}