<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<script src="{{ mix('js/app.js') }}"></script>
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">DanGym</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('blog') }}">Blog</a></li>
					<li><a href="{{ route('teams') }}">Hold</a></li>
					<li><a href="{{ route('events') }}">Kalender</a></li>
					<li><a href="{{ route('galleries') }}">Billede Arkiv</a></li>
					<li><a href="{{ route('about') }}">Klubben</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(auth()->check())
						@if(auth()->user()->isAdmin())
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ route('admin.posts.index') }}">Nyheder</a></li>
									<li><a href="{{ route('admin.users.index') }}">Medlemmer</a></li>
									<li><a href="{{ route('admin.teams.index') }}">Hold</a></li>
									<li><a href="{{ route('admin.galleries.index') }}">Billeder</a></li>
									<li><a href="{{ route('admin.events.index') }}">Begivenheder</a></li>
									<li><a href="{{ route('admin.about.edit') }}">Klubben</a></li>
								</ul>
							</li>
						@endif
						<li><a href="{{ route('user.profile') }}">Profile</a></li>
						<li><a href="{{ route('logout') }}">Log ud</a></li>
					@else
						<li><a href="{{ route('login') }}">Log ind</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		
		@yield('wrapper')
	</div>
</body>
</html>