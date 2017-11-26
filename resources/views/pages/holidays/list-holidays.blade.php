@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Data</th>
			<th>Descrição</th>
			<th>Tipo</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($holidays as $key => $value): ?>
			<tr>
				<td>{!! date_format(date_create_from_format('Y-m-d', $value->holiday), 'd/m/Y') !!}</td>
				<td>{!! $value->description !!}</td>
				<td>{!! $value->holiday_type !!}</td>
				<td><a href="{!! url('edit-holiday/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-holiday/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection