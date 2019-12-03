<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{



    public function index( $user)
    {
        // If not found, it gives error404 instead of error500
        $user =User::findOrFail($user);
        
        return view('profiles/index', ['user' => $user]);
    }


    // Does the same as the index function but with simpler syntax utilizing Laravel
    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);

        // auth()->user->profile->update($data);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));

        return redirect("/profile/{$user->id}");
    }
}
