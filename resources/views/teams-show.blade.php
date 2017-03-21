@extends('app')

@section('wrapper')
	<div class="blog-post">
        <h2 class="blog-post-title">{{ $team->title }}</h2>
        <p>{{ $team->description }}</p>
        <strong>Alder</strong>
        <p>{{ $team->options['age_range']['from'] }}-{{ $team->options['age_range']['to'] }} år</p>
        <strong>Trænings tider</strong>
        <p>{{ $team->options['training']['day'] }}: {{ $team->options['training']['time']['from'] }}-{{ $team->options['training']['time']['to'] }}</p>
		<strong>Medlemmer</strong>
		<ul>
			@foreach($team->users as $user)
				<li>{{ $user->name }}</li>
			@endforeach
		</ul>
    </div>
@stop