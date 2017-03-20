@inject('archives', 'App\BlogArchive')

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
	<div class="sidebar-module">
		<h4>Archives</h4>
		<ol class="list-unstyled">
			@foreach($archives->list() as $year => $group)
			<li>
				{{ $year }}
				<ul>
					@foreach($group as $month => $count)
					<li><a href="{{ route('blog', ['year' => $year, 'month' => date('m', strtotime($month))]) }}">{{ $month }} ({{ $count }})</a></li>
					@endforeach
				</ul>
			</li>
			@endforeach
		</ol>
	</div>
</div>