@extends('app')

@section('wrapper')
	<form class="form-signin" method="post" action="{{ route('register') }}">
		{{ csrf_field() }}
        <h2 class="form-signin-heading">Opret Bruger</h2>

        <div style="margin-bottom: 10px;">
        	<label for="name">Navn</label>
        	<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div style="margin-bottom: 10px;">
        	<label for="email">Email</label>
        	<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        
        <div style="margin-bottom: 10px;">
        	<label for="password">Adgangskode</label>
        	<input type="password" id="password" name="password" class="form-control">
        </div>

        <div style="margin-bottom: 10px;">
        	<label for="password2">Gentag Adgangskode</label>
        	<input type="password" id="password2" name="password_confirmation" class="form-control">
        </div>

        <div style="margin-bottom: 10px;">
        	<label>Birthdate</label>
			<input type="text" class="form-control" name="birthdate" value="{{ old('birthdate') }}">
        </div>

        <div style="margin-bottom: 15px;">
			    <label>Gender</label>
			    <select class="form-control" name="gender">
			      <option value="">Select</option>
				  <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
				  <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
				</select>
			</div>
        
        <div>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">Opret</button>
        </div>
    </form>
@stop