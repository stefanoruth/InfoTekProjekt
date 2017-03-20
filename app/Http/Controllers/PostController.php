<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::when(request('year'), function($query, $year){
			$query->whereYear('created_at', $year);
		})
		->when(request('month'), function($query, $month){
			$query->whereMonth('created_at', $month);
		})
		->orderBy('created_at', 'DESC')
		->paginate(10)
		->appends([
			'year' => request('year'),
			'month' => request('month'),
		]);

		return view('blog', compact('posts'));
	}

	public function show($slug)
	{
		$post = Post::where('slug', $slug)->firstOrFail();
		$prevPost = Post::where('created_at', '<', $post->created_at)->orderBy('created_at', 'DESC')->first();
		$nextPost = Post::where('created_at', '>', $post->created_at)->orderBy('created_at', 'ASC')->first();

		return view('show-post', compact('post', 'prevPost', 'nextPost'));
	}
}
