<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    // public function profileImage()
    // {
    //     $imagePath = $this->image;

    //     return '/storage/' . $imagePath;
    //     $bla = 'logo_/wes.jpg';
    //     $imagePath = '';

    //     return '/storage/' . ($this->image) ? $this->image : $bla;
    //

    // public function profileImage()
    // {
    //    $imagePath = ($this->image) ? $this->image.'/storage/' : 'http://127.0.0.1:8000/storage/profile/uFzxfePXZ5VkWik4lf3bZSxqtypcGtNUrP0HW2jX.jpg';
    // return $imagePath;
    //  // $imagePath = ($this->image) ? $this->image : 'profil/wes.jpg';

    //   //return 'storage/'.$imagePath;

    // }

     public function followers()
     {
        return $this->belongsToMany(User::class);

     }


   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
