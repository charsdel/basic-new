<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PageController extends Controller
{
    public function posts()
    {

        $posts = Post::all();

        return view('posts', [

            'posts' => Post::with('user')->latest()->paginate()
            #'posts' => $posts
        ]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
