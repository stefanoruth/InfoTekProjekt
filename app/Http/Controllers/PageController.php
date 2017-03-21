<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();

        return view('welcome', compact('posts'));
    }

    public function about()
    {
    	return view('about');
    }
}
