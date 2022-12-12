<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

     $inputs = request()->validate([  /* validate inputs that is comming from form and save in this array - $inputs*/

         'title' => 'required|min:8|max:255',
         'post_image' => 'file',
         'body' => 'required'
      ]);

      if(request('post_image')){
         $inputs['post_image'] = request('post_image')->store('images');  //store method maka a folder and store image in random way
      }


       auth()->user()->posts()->create($inputs);

       session()->flash('post-created-message', 'Post with title was created' . $inputs['title'] );

       return redirect()->route('post.index'); //redirect to route


   }

   protected function getPostImageAttribute($value)
    {
      if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
          return $value;
      }
      return asset('storage/' . $value);
    }




   public function index()
   {

     $posts = Post::all();

     foreach($posts as $post){
      $post->post_image = $this->getPostImageAttribute($post->post_image);
     }

    return view('admin.posts.index', ['posts' => $posts]);

   }

   public function destroy(Post $post, Request $request)
   {

      $post->delete();

      $request->session()->flash('message', 'Post was deleted');

      return back();
   }
}
