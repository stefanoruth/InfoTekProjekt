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
	@if($user->subscribed($user->plan('name')))

		@if(!is_null($user->subscription($user->plan('name'))->ends_at))
			<p>Kontigent udløber den {{ $user->subscription($user->plan('name'))->ends_at->format('d/m-Y') }}</p>
		@else
			<form action="{{ route('user.subscription.cancel') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="force" value="0">
				<button class="btn btn-primary">Annuller kontigent</button>
			</form>
		@endif
		
		

		<form action="{{ route('user.subscription.cancel') }}" method="POST" style="margin-top: 15px;">
			{{ csrf_field() }}
			<input type="hidden" name="force" value="1">
			<button class="btn btn-primary">Annuller kontigent nu</button>
		</form>
	@else
		<p>{{ $user->plan('title') }}: {{ $user->plan('price')/100 }},- pr. år.</p>
		<form action="{{ route('user.subscribe') }}" method="POST">
		{{ csrf_field() }}
			<script
				src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				data-key="{{ config('services.stripe.key') }}"
				data-amount="{{ $user->plan('price') }}"
				data-email="{{ $user->email }}"
				data-name="InfoTekDemo"
				data-description="Kontigent - {{ $user->plan('title') }}"
				data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
				data-locale="da"
				data-zip-code="false"
				data-label="Betal kontigent"
				data-allow-remember-me="false"
				data-currency="dkk">
			</script>
		</form>
	@endif
@stop