<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
	<div class="top-bar">
		<div class="top-bar-left">
			<ul class="dropdown menu" data-dropdown-menu>
				<li class="menu-text">{{ config('app.name') }}</li>
				<li><a href="{{ url('/') }}">Forside</a></li>
				<li><a href="#">Hold</a></li>
				<li><a href="#">Kalender</a></li>
				<li><a href="#">Klubben</a></li>
			</ul>
		</div>
		<div class="top-bar-right">
			<ul class="menu">
				<li><a href="{{ route('login') }}">Log ind</a></li>
			</ul>
		</div>
	</div>
	@yield('wrapper')
	<div class="scripts">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
		<script src="{{ mix('js/app.js') }}"></script>
		<script>
			$(document).foundation();
		</script>
	</div>
</body>
</html>