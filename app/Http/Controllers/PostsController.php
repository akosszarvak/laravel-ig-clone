<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth');
   }


    public function create(){
        return view('posts/create');
    }

    public function store(){
        // if there is a field does not require validation, pass it in as empty string: novalidation => '', 
        $data = request()->validate([
            'caption' => 'required',
            'image' =>[ 'required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
       
       $image = Image::make("storage/{$imagePath}")->fit(1200,1200);
       $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
       
        return redirect('/profile/' . auth() ->user()->id);
    }

    // Binding $post to a Post object (same syntax allows it in Laravel)
    public function show(\App\Post $post){
       return view('posts/show', compact('post'));
    }
}
