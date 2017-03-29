@extends('app')

@section('wrapper')
	<div class="row">
		<form action="{{ route('admin.users.index') }}">
			<div class="form-group">
			    <label for="Title">Filtre brugere</label>
			    <input type="text" class="form-control" id="Title" name="q" value="{{ request('q') }}">
			</div>
			<button type="submit" class="btn btn-default">Søg</button>
		</form>
	</div>
	<hr>
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th style="width: 80px;">Age</th>
					<th style="width: 80px;">Gender</th>
					<th style="width: 80px;">Role</th>
					<th style="width: 80px;">Active</th>
					<th>Teams</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->age }}</td>
						<td>{{ $user->gender }}</td>
						<td>{{ $user->role }}</td>
						<td></td>
						<td>{{ implode(', ', $user->listTeams()) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>{{ $users->links() }}</div>
	</div>
@stop