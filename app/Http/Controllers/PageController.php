<?php

namespace App\Http\Controllers;

use App\Page;
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
        $page = Page::where('slug', 'about')->firstOrFail();

        return view('page', compact('page'));
    }
}
