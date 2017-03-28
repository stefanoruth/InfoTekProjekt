@extends('app')

@section('wrapper')
	<div class="row marketing" style="margin-bottom: 60px;">
		@foreach($gallery->images() as $image)
			<div class="col-lg-4">
		      <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" style="width: 100%;"></a>
		    </div>
		@endforeach
	</div>
@stop