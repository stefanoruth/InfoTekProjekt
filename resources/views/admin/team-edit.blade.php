@extends('app')

@section('wrapper')
	<form action="{{ route('admin.teams.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $team->id }}">
	  <div class="form-group">
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="Title" name="title" value="{{ old('title') ?? $team->title }}">
	  </div>
	  <div class="form-group">
	    <label for="Description">Description</label>
	    <textarea name="description" id="Description" style="height: 250px;">{{ old('description') ?? $team->description }}</textarea>
	  </div>
	  <div>
	  	<select multiple class="form-control" style="height: 500px;" name="users[]">
	  		@foreach($users as $user)
	  			@if(in_array($user->id, $team->users->pluck('id')->all()))
		  			<option value="{{ $user->id }}" selected="">{{ $user->name }}</option>
		  		@else
		  			<option value="{{ $user->id }}">{{ $user->name }}</option>
		  		@endif
	  		@endforeach
		</select>
	  </div>
	  <button type="submit" class="btn btn-default">Save</button>
	</form>
@stop