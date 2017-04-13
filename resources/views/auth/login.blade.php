@extends('app')

@section('wrapper')
	<form class="form-signin" method="post" action="{{ route('login') }}">
		{{ csrf_field() }}
        <h2 class="form-signin-heading">Login</h2>
        <div style="margin-bottom: 10px;">
        	<label for="email">Email</label>
        	<input type="text" id="email" name="email" class="form-control">
        </div>
        
        <div style="margin-bottom: 15px;">
        	<label for="password">Password</label>
        	<input type="password" id="password" name="password" class="form-control">
        </div>
        
        <div>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Signin</button>
        </div>
    </form>
@stop