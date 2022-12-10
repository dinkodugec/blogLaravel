<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function show($id)
   {

   /*    dd($id); */

      Post::findOrFail($id);

     return view('blog-post');

   }
}