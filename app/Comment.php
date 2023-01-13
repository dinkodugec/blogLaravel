<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
  /*   protected $filable = [
        'post_id',
        'author',
        'content'
    ]; */
    //blog_post_id  - name of this method is not random-in this way laravel will look for foreign key on related model
   public function blogPosts()
   {
    return $this->belongsToMany(Post::class);
   }
}
