@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($events as $event)
					<tr>
						<td>{{ $event->start_at->format('d/m-Y H:i') }} - {{ $event->ends_at->format('d/m-Y H:i') }}</td>
						<td>{{ $event->title }}</td>
						<td style="width: 80px;"><a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-default">Edit</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>
			<a href="{{ route('admin.events.create') }}" class="btn btn-primary">Opret Begivenhed</a>
		</div>
	</div>
@stop