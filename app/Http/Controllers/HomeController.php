<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /*  $this->middleware('auth'); */ //if user is not auth do not let him in
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();

        return view('home', ['posts' => $posts], ['users'=> $users]);
    }



    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
}