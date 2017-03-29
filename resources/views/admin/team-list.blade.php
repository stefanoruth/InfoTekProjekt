@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($teams as $team)
					<tr>
						<td>{{ $team->title }}</td>
						<td style="width: 80px;"><a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-default">Edit</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>
			<a href="{{ route('admin.teams.create') }}" class="btn btn-primary">Opret Hold</a>
		</div>
	</div>
@stop