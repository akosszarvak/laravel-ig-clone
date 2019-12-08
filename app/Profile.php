<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
       
        
      $imagePath = ($this->image) ? $this->image : 'profile/BfWES7923cICOcL6sWbfS6shALj5aE0kAkCre0Vf.png';
    
      return '/storage/' . $imagePath;
    }

    public function followers(){
      return $this->belongsToMany(User::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
