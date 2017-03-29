@extends('app')

@section('wrapper')
	<div class="blog-header">
			<h1 class="blog-title">Blog</h1>
		</div>
    <div class="row">
    	<div class="col-sm-8 blog-main">

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">{{ $post->created_at->format('d F, Y') }}</p>
		{!! $post->body !!}
      </div>

		@include('partial.post-pager', [
		  	'next' => $nextPost,
		  	'prev' => $prevPost,
		])

    </div>

	@include('partial.post-archive')
    </div>
@stop