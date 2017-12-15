@extends('layouts.app')

@section('content')
@if(count($days))

<div class="col-md-12">
	<h3>Results for {{$company}}</h3>
	<table class="table table-hover" id="users-table">
		<thead>
			<th>
				Date
			</th>
			<th>
				Open
			</th>
			<th>
				High
			</th>
			<th>
				Low
			</th>
			<th>
				Close
			</th>
			<th>
				Volume
			</th>
		</thead>
		<tbody>
			@foreach($days as $key => $value)
			<tr>
					<td>
						{{$value['﻿Date']}}
					</td>
					<td>
						{{$value['Open']}}
					</td>
					<td>
						{{$value['High']}}
					</td>
					<td>
						{{$value['Low']}}
					</td>
					<td>
						{{$value['Close']}}
					</td>
					<td>
						{{$value['Volume']}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div id="chartdiv"></div>
	<div class="row">
		<div class="col-md-2">
			<p style="color:#fe6a09; font-size: 16px;"><b>Open value</b></p>
		</div>
		<div class="col-md-2">
			<p style="color:#fbd201; font-size: 16px;"><b>Close value</b></p>
		</div>
	</row>
	<table id="data" style="display:none;">
		<thead>
			<tr>
				<th></th>
				<th>Revenue</th>
				<th>Expenses</th>
			</tr>
		</thead>
		<tbody>
			@foreach($days as $key => $value)
			<tr>
				<th>
					{{$value['﻿Date']}}
				</th>
				<td>
					{{$value['Open']}}
				</td>
				<td>
					{{$value['Close']}}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endif
@endsection