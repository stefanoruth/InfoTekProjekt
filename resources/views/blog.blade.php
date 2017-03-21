@extends('app')

@section('wrapper')
	<div class="blog-header">
		<h1 class="blog-title">Blog</h1>
	</div>
	<div class="row">
		<div class="col-sm-8 blog-main">
			@foreach($posts as $post)
				<div class="blog-post" style="margin-bottom: 30px;">
					<h2 class="blog-post-title"><a href="{{ $post->link() }}">{{ $post->title }}</a></h2>
					<p class="blog-post-meta">{{ $post->created_at->format('d F, Y') }}</p>
					<p>{{ $post->short }}</p>
				 </div>
			@endforeach
			{{ $posts->links() }}
		</div>
		@include('partial.post-archive')
	</div>
@stop