<nav>
	<ul class="pager">
		<li><a href="{{ is_null($prev) ? '#' : $prev->link() }}">Previous</a></li>
		<li><a href="{{ is_null($next) ? '#' : $next->link() }}">Next</a></li>
	</ul>
</nav>