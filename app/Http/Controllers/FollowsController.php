<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use App\Profile;

class FollowsController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this-> middleware('auth');
    }
    public function store(User $user){

        return auth()->user()->following()->toggle($user->profile);
    }
}
