@extends('app')

@section('wrapper')
	<div class="jumbotron">
		<h1>Vi elsker Sport!</h1>
		<p class="lead">{{ config('app.name') }}</p>
	</div>

	<div class="row">
		@foreach($posts as $post)
	        <div class="col-lg-4">
	          <h2>{{ $post->title }}</h2>
	          <p>{{ $post->short }}</p>
	          <p><a class="btn btn-default" href="{{ $post->link() }}" role="button">View details »</a></p>
	        </div>
        @endforeach
      </div>
@stop