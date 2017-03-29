@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{$post->created_at->format('d F, Y') }} - {{ $post->title }}</td>
						<td style="width: 80px;"><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-default">Edit</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>
			<a href="{{ route('admin.posts.create') }}" class="btn btn-primary">New Post</a>
		</div>
		{{ $posts->links() }}
	</div>
@stop