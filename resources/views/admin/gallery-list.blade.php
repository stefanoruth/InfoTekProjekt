@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($galleries as $gallery)
					<tr>
						<td>{{ $gallery->title }}</td>
						<td style="width: 80px;"><a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-default">Edit</a></td>
						<td style="width: 100px;"><a href="{{ route('admin.galleries.delete', $gallery->id) }}" class="btn btn-danger">Remove</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>
			<a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Opret Gallery</a>
		</div>
	</div>
@stop