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

   public function store(Request $request)
   {

     $inputs = request()->validate([  /* validate inputs that is comming from form and save in this array - $inputs*/

         'title' => 'required|min:8|max:255',
         'post_image' => 'file',
         'body' => 'required'
      ]);

      if(request('post_image')){
         $inputs['post_image'] = request('post_image')->store('images');  //store method maka a folder and store image in random way
      }

      dd($request->post_image);



   }
}