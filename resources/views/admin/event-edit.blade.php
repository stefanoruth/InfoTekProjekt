@extends('app')

@section('wrapper')
	<form action="{{ route('admin.events.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $event->id }}">
	  <div class="form-group">
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="Title" name="title" value="{{ old('title') ?? $event->title }}">
	  </div>
	  <div class="form-group">
	    <label for="Description">Description</label>
	    <textarea name="description" id="Description" style="height: 250px;">{{ old('description') ?? $event->description }}</textarea>
	  </div>
	  <div class="form-group">
	    <label for="start">Start At</label>
	    <input type="datetime" class="form-control" id="start" name="start" value="{{ old('start') ?? $event->start_at }}">
	  </div>
	  <div class="form-group">
	    <label for="end">Ends At</label>
	    <input type="datetime" class="form-control" id="end" name="end" value="{{ old('end') ?? $event->ends_at }}">
	  </div>
	  <button type="submit" class="btn btn-default">Save</button>
	</form>
@stop