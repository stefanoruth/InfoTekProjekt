@extends('app')

@section('wrapper')
	<form action="{{ route('admin.about.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $page->id }}">
	  <div class="form-group">
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="Title" name="title" value="{{ old('title') ?? $page->title }}">
	  </div>
	  <div class="form-group">
	    <label for="Body">Body</label>
	    <textarea name="body" id="Body" style="height: 500px;">{{ old('body') ?? $page->body }}</textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Save</button>
	</form>
@stop