<?php

namespace App\Http\Controllers;

use App\Event;
use App\Gallery;
use App\Page;
use App\Post;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pageEdit()
    {
    	$page = Page::where('slug', 'about')->firstOrFail();

    	return view('admin.page-edit', compact('page'));
    }

    public function pageStore()
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required',
    	]);

    	$page = Page::firstOrNew(['id' => request('id')]);
    	$page->title = request('title');
    	$page->body = request('body');
    	$page->save();

    	return redirect()->route('admin.about.edit');
    }

    public function postList()
    {
    	$posts = Post::orderBy('created_at', 'DESC')->paginate(20);
    	return view('admin.post-list', compact('posts'));
    }

    public function postEdit($id)
    {
    	$post = Post::findOrFail($id);
    	return view('admin.post-edit', compact('post'));
    }

    public function postCreate()
    {
    	$post = new Post;
    	return view('admin.post-edit', compact('post'));
    }

    public function postStore()
    {
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required',
    	]);

    	$post = Post::firstOrNew(['id' => request('id')]);
    	$post->title = request('title');
    	$post->slug = str_slug($post->title);
    	$post->body = request('body');
    	$post->save();

    	return redirect()->route('admin.posts.index');
    }

    public function teamList()
    {
    	$teams = Team::all();

    	return view('admin.team-list', compact('teams'));
    }

    public function teamEdit($id)
    {
    	$team = Team::with('users')->findOrFail($id);
    	$users = User::all();

    	return view('admin.team-edit', compact('team', 'users'));
    }

    public function teamStore()
    {
    	$this->validate(request(), [
    		'title' => 'required',
    	]);

    	$team = Team::firstOrNew(['id' => request('id')]);
    	$team->title = request('title');
    	$team->description = request('description');
    	$team->save();
    	$team->users()->sync(request('users'));

    	return redirect()->route('admin.teams.edit', $team->id);
    }

    public function eventList()
    {
    	$events = Event::all();

    	return view('admin.event-list', compact('events'));
    }

    public function eventEdit($id)
    {
    	$event = Event::findOrFail($id);

    	return view('admin.event-edit', compact('event'));
    }

    public function eventCreate()
    {
    	$event = new Event;

    	return view('admin.event-edit', compact('event'));
    }

    public function eventStore()
    {
    	$this->validate(request(), [
			'title' => 'required',
			'start' => 'required|date_format:Y-m-d H:i:s',
			'end'   => 'required|date_format:Y-m-d H:i:s',
    	]);

    	$event = Event::firstOrNew(['id' => request('id')]);
    	$event->title = request('title');
    	$event->description = request('description');
    	$event->start_at = request('start');
    	$event->ends_at = request('end');
    	$event->save();

    	return redirect()->route('admin.events.index');
    }

    public function galleryList()
    {
    	$galleries = Gallery::all();

    	return view('admin.gallery-list', compact('galleries'));
    }

    public function galleryEdit($id)
    {
    	$gallery = Gallery::findOrFail($id);

    	return view('admin.gallery-edit', compact('gallery'));
    }
}
