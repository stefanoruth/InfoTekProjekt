@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<thead>
				<tr>
					<th>Event</th>
					<th style="width: 300px;">Date</th>
					<th style="width: 120px;">Attending</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
					<tr>
						<td><a href="{{ $event->link() }}">{{ $event->title }}</a></td>
						<td>{{ $event->start_at->format('d/m-Y H:i') }} - {{ $event->ends_at->format('d/m-Y H:i') }}</td>
						<td>{{ $event->attending() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop