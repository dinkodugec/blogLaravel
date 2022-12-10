<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   public function show(Post $post)  //injected clas - route model binding
   {

    return view('blog-post', ['post' => $post]);

   }

   public function create()
   {

    return view('admin.posts.create');

   }

   public function store()
   {

      Auth::user();  //get a user
      auth()->user();  //also..get a user
      //so that we create post with related user

    dd(request()->all()); //helper function request will show everything what is comming from this endpoint(in web.php)

   }
}