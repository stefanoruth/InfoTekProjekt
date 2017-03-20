<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $posts = Post::all();

        return view('welcome', compact('posts'));
    }
}
