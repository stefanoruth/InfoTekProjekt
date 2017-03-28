@extends('app')

@section('wrapper')
	<div class="row marketing">
		<table class="table table-bordered" style="table-layout: fixed;">
			<tbody>
				@foreach($galleries as $gallery)
					<tr>
						<td><a href="{{ $gallery->link() }}">{{ $gallery->title }}</a></td>
						<td style="width: 50px;text-align: center;">{{ $gallery->imageCount() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop