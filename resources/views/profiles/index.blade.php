@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
   <div class="col-3 p-5">
         <img src="https://i.pinimg.com/originals/e6/55/ce/e655ce1144c875be18c69a7073687047.png" style="height: 120px; width: 120px;"  class="rounded-circle"/>
   </div>
   <div class="col-9 pt-5">
         <div  class="d-flex justify-content-between align-items-baseline"><h1>{{$user->username}}</h1>
         <a href="#">Add new Post</a>
         </div>
         <div class ="d-flex">
         <div class="pr-5"><strong>153</strong> posts </div>
         <div class="pr-5"><strong>23k</strong> follower </div>
         <div class="pr-5"><strong>212</strong> following </div>
        
         </div>
         <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
         <div>{{$user->profile->description}}</div>
        <div><a href="#" >{{$user->profile->url }}</a></div>
    </div>
   </div>

   <div class="row pt-5">
   <div class="col-4">
   <img src="https://scontent-vie1-1.cdninstagram.com/v/t51.2885-15/e35/c145.0.320.320a/75225391_766830757166381_6557989949148258945_n.jpg?_nc_ht=scontent-vie1-1.cdninstagram.com&_nc_cat=105&oh=7a6eac87d79d2913c3f59d2f76194831&oe=5E694B73" class="w-100" alt="" />
   </div>
   <div class="col-4">
   <img src="https://scontent-vie1-1.cdninstagram.com/v/t51.2885-15/e35/c145.0.320.320a/75225391_766830757166381_6557989949148258945_n.jpg?_nc_ht=scontent-vie1-1.cdninstagram.com&_nc_cat=105&oh=7a6eac87d79d2913c3f59d2f76194831&oe=5E694B73" class="w-100" alt="" />
   </div>
   <div class="col-4">
   <img src="https://scontent-vie1-1.cdninstagram.com/v/t51.2885-15/e35/c145.0.320.320a/75225391_766830757166381_6557989949148258945_n.jpg?_nc_ht=scontent-vie1-1.cdninstagram.com&_nc_cat=105&oh=7a6eac87d79d2913c3f59d2f76194831&oe=5E694B73" class="w-100" alt="" />
   </div>
   
   </div>
</div>
@endsection
