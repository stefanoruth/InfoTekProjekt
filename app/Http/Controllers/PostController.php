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

		$prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'ASC')->first();
		$nextPost = Post::where('id', '>', $post->id)->orderBy('id', 'DESC')->first();

		return view('show-post', compact('post', 'prevPost', 'nextPost'));
	}
}
