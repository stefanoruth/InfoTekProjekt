<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<script src="{{ mix('js/app.js') }}"></script>
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
				<a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('teams') }}">Hold</a></li>
					<li><a href="#">Kalender</a></li>
					<li><a href="#">Klubben</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('login') }}">Log ind</a></li>
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