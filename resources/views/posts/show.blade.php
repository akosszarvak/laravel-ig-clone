@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
         <img src="/storage/{{$post->image}}" class="w-100">
    </div>
    <div class="col-4">
         <div class="d-flex align-items-center">
            <div class="pr-3">
                <img src="{{$post->user->profile->profileImage()}}" style="max-width: 40px;" class=" rounded-circle w-100">
            </div>
            <div> 
                <div class="font-weight-bold">
                <a href="/profile/{{$post->user->id}}">
                <span class="text-dark">{{$post->user->username}}</a> </span>
                <a href="#" class=pl-2>Follow</a>
                  </div>
            </div>
       
         
         </div>
          <hr>

         <div>

<p>  <a href="/profile/{{$post->user->id}}"> <span class="font-weight-bold pr-1 text-dark">{{$post->user->username}}</span> </a>{{$post->caption}}</p>
</div>
    </div>
  </div>
</div>
@endsection
