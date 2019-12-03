<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{



    public function index($user)
    {
        // If not found, it gives error404 instead of error500
        $user =User::findOrFail($user);
        
        return view('profiles/index', ['user' => $user]);
    }
}
