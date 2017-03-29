@extends('app')

@section('wrapper')

	<form action="{{ route('admin.galleries.store') }}" method="post">
			{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $gallery->id }}">
		<input type="hidden" name="type" value="edit">
		<div class="form-group">
		    <label for="Title">Title</label>
		    <input type="text" class="form-control" id="Title" name="title" value="{{ old('title') ?? $gallery->title }}">
		  </div>
		<button type="submit" class="btn btn-default">Save</button>
	</form>

	<hr>

	@if(!is_null($gallery->id))
		<form action="{{ route('admin.galleries.store') }}" class="dropzone">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $gallery->id }}">
			<input type="hidden" name="type" value="image">
		</form>
		<a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-primary" style="margin-top: 10px;">Refresh</a>

		<hr>

		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($gallery->images() as $key => $image)
					<tr>
						<td><a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100px"></a></td>
						<td style="width: 100px"><a href="{{ route('admin.galleries.image.remove', [$gallery->id, $key]) }}" class="btn btn-danger">Remove</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop

@push('head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endpush