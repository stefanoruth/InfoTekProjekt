@extends('app')

@section('wrapper')
	<form action="{{ route('admin.posts.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $post->id }}">
	  <div class="form-group">
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="Title" name="title" value="{{ old('title') ?? $post->title }}">
	  </div>
	  <div class="form-group">
	    <label for="Body">Body</label>
	    <textarea name="body" id="Body" style="height: 500px;">{{ old('body') ?? $post->body }}</textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Save</button>
	</form>
@stop