<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
    	$events = Event::orderBy('start_at', 'DESC')->paginate(15);

    	return view('events', compact('events'));
    }

    public function show($id)
    {
    	$event = Event::with('users')->findOrFail($id);

    	return view('events-show', compact('event'));
    }

    public function toggleEvent($id)
    {
    	$event = Event::findOrFail($id);

    	$userId = auth()->id();

    	if ($event->isAttending($userId)) {
    		$event->users()->detach($userId);
    	} else {
    		$event->users()->attach($userId);
    	}

    	return redirect()->route('events.show', $event->id);
    }
}
