@extends('app')

@section('wrapper')
	<div class="row marketing">
		@foreach($teams as $team)
			<div class="col-lg-4">
		      <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
		      <h2 style="min-height: 66px;">{{ $team->title }}</h2>
		      <p><a class="btn btn-default" href="{{ $team->link() }}" role="button">View details »</a></p>
		    </div>
		@endforeach
	</div>
@stop