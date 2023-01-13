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

   /*  $this->authorize('create', Post::class);  */ //check for auth user to can create

    return view('admin.posts.create');

   }

   public function store()
   {

    $this->authorize('create', Post::class);   //create method from PostPolicy

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


   public function edit(Post $post)
   {
        /*   $this->authorize('view', $post);  */ //only authorize user can access esit view in blade

        $this->authorize('view', $post);

          return view('admin.posts.edit', ['post'=> $post]);

   }

/*    protected function getPostImageAttribute($value)
    {
      if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
          return $value;
      }
      return asset('storage/' . $value);
    }
 */



   public function index()
   {

   /*    $posts = Post::all(); */

        $posts = auth()->user()->posts;
           // -it bring collection of objects, array of instatnces, from auth() user vi method posts() in User class

   /*  $posts = auth()->user()->posts;  */    //array of items

   /*   foreach($posts as $post){
      $post->post_image = $this->getPostImageAttribute($post->post_image);
     }
 */
    return view('admin.posts.index', ['posts' => $posts]);

   }

   public function destroy(Post $post, Request $request)
   {

      $post->delete();

      $request->session()->flash('message', 'Post was deleted');

      $this->authorize('update', $post);


      return back();
   }

   public function update(Post $post)
   {

      $inputs = request()->validate([
         'title' => 'required|min:8|max:225',           //key will be from name attribute value
         'post_image' => 'file',  //mimes|jpeg,bmp,png
         'body'=> 'required'
     ]);


         if(request('post_image')){
             $inputs['post_image'] = request('post_image')->store('images');
             $post->post_image = $inputs['post_image'];
         }

         $post->title = $inputs['title'];
         $post->body = $inputs['body'];

      $this->authorize('update', $post);  //update can only auth user

     $post->save();

     session()->flash('post-updated-message', 'Post with title was updated' . $inputs['title'] );

     return redirect()->route('post.index');
   }
}
