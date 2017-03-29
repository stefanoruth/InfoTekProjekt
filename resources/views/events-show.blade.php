@extends('app')

@section('wrapper')
	<div class="blog-post">
        <h2 class="blog-post-title">{{ $event->title }}</h2>
        <p>{{ $event->description }}</p>
        <p><strong>Start:</strong> {{ $event->start_at->format('d/m-Y H:i') }}</p>
        <p><strong>Ends:</strong> {{ $event->ends_at->format('d/m-Y H:i') }}</p>
        <p><strong>Tilmeldte:</strong></p>
        <ul>
        	@foreach($event->users as $user)
				<li>{{ $user->name }}</li>
        	@endforeach
        </ul>
        @if(auth()->check())
        	@if($event->isAttending(auth()->id()))
        		<a href="{{ route('events.join', $event->id) }}">Frameld</a>
        	@else
        		<a href="{{ route('events.join', $event->id) }}">Tilmeld</a>
        	@endif
        @endif
    </div>
@stop