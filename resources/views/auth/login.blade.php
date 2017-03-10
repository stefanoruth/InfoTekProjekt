@extends('app')

@section('wrapper')
	<form class="form-signin" method="post" action="{{ route('login') }}">
		{{ csrf_field() }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" id="email" class="form-control" placeholder="Email address">
        <input type="password" id="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
@stop