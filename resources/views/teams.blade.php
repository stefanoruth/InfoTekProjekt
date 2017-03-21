@inject('trainingSchedule', 'App\TrainingSchedule')
@extends('app')

@section('wrapper')
	<div class="row marketing" style="margin-bottom: 60px;">
		@foreach($teams as $team)
			<div class="col-lg-4">
		      <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
		      <h2 style="min-height: 66px;">{{ $team->title }}</h2>
		      <p><a class="btn btn-default" href="{{ $team->link() }}" role="button">View details »</a></p>
		    </div>
		@endforeach
	</div>

	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<thead>
				<tr>
					<th style="width: 60px;">#</th>
					@foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Sunday','Saturday'] as $i)
						<th>{{ $i }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($trainingSchedule->list() as $time => $date)
					<tr>
						<td>{{ $time }}</td>
						@foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Sunday','Saturday'] as $i)
							@if(isset($date[$i]))
								<td>
									@foreach($date[$i] as $team)
										<p><a href="{{ $team->link() }}">{{ $team->title }}</a></p>
									@endforeach
								</td>
							@else
								<td></td>
							@endif
						@endforeach
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop