@extends('app')

@section('wrapper')
	<div class="jumbotron">
		<h1>Vi elsker Sport!</h1>
		<p class="lead">{{ config('app.name') }}</p>
	</div>

	<div class="row">
		@foreach($posts as $post)
	        <div class="col-lg-4">
	          <h2>Safari bug warning!</h2>
	          <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
	          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
	          <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
	        </div>
        @endforeach
      </div>
@stop