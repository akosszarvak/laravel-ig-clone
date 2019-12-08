<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Cache;


class ProfileController extends Controller
{



    public function index(User $user)
    {


        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $postCount = $user->posts->count();
        $followerCount = $user->profile->followers->count();
        $followingCount = $user->following->count();


        // $postCount =Cache::remember('count.posts.' . $user->id,
        //  now()->addSeconds(30),
        //   function () use ($user) {
        //    return $user->posts->count();
        // });
        // $followerCount = $user->profile->followers->count();
        // $followingCount = $use->following->count();

        return view('profiles/index', compact('user', 'follows' , 'postCount', 'followerCount', 'followingCount'));
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

           $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
           
        ));

        return redirect("/profile/{$user->id}");
    }
}
