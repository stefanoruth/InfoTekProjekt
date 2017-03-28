@extends('app')

@section('wrapper')
<div class="starter-template">
	<h1>{{ $page->title }}</h1>
	<div>{!! $page->body !!}</div>
</div>
@stop