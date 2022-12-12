<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];


    public function user()
   {
       return $this->belongsTo(User::class);  //each post has user
   }




     //mutators - change the data before come in DB
/*    public function setPostImageAttribute($value)
   {

       $this->attributes['post_image'] = asset($value);


   } */


   //accesors - return data
   public function getPostImageAttribute($value)
    {

        return asset($value);
    }
}