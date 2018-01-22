@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>OS</th>
			<th>Ano</th>
			<th>Mês</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($serviceOrders as $key => $value): ?>
			<tr>
				<td>{!! $value->os !!}</td>
				<td>{!! $value->year !!}</td>
				<td>{!! $value->month !!}</td>
				<td><a href="{!! url('edit-service_order/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-service_order/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection