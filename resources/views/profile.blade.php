@extends('app')

@section('wrapper')
		<form action="{{ route('user.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
			    <label>Name</label>
			    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}">
			</div>
			<div class="form-group">
			    <label>Email</label>
			    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">
			</div>
			<div class="form-group">
			    <label>Password</label>
			    <input type="password" class="form-control" name="password">
			  </div>
			 <div class="form-group">
			    <label>Password Confirmation</label>
			    <input type="password" class="form-control" name="password_confirmation">
			  </div>
			  <div class="form-group">
			    <label>Birthdate</label>
			    <input type="text" class="form-control" name="birthdate" value="{{ old('birthdate') ?? $user->birthdate->format('Y-m-d') }}">
			</div>
			<div class="form-group">
			    <label>Gender</label>
			    <select class="form-control" name="gender">
			    	<option value="">Select</option>
				  <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
				  <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>

	<hr>

	<strong>Hold</strong>
	<ul>
		@foreach($user->teams()->get() as $team)
			<li><a href="{{ $team->link() }}">{{ $team->title }}</a></li>
		@endforeach
	</ul>

	<strong>Kontigent</strong>
	<form action="{{ route('user.subscribe') }}" method="POST">
	{{ csrf_field() }}
	  <script
	    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
	    data-key="{{ config('services.stripe.key') }}"
	    data-amount="999"
	    data-name="InfoTekDemo"
	    data-description="Kontigent"
	    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
	    data-locale="auto"
	    data-zip-code="false"
	    data-currency="dkk">
	  </script>
	</form>
@stop