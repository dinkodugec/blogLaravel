<?php

use App\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


               factory(App\User::class, 10)->create()->each(function ($user) {
                $user->posts()->save(factory(App\Post::class)->make());
            });

          /*   factory(User::class, 10)->create(); */
    }
}