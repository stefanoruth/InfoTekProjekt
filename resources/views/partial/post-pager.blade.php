<nav>
	<ul class="pager">
		@if(!is_null($prev))
			<li><a href="{{ $prev->link() }}">Previous</a></li>
		@endif
		@if(!is_null($next))
			<li><a href="{{ $next->link() }}">Next</a></li>
		@endif
	</ul>
</nav>