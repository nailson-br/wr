@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Status</th>
			<th>Solicitante</th>
			<th>E-mail</th>
			<th>Planilha para</th>
			<th>Início</th>
			<th>MO</th>
			<th>Término</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($services as $key => $value): ?>
			<tr>
				<td>{!! $value->active !!}</td>
				<td>{!! $value->requirer !!}</td>
				<td>{!! $value->email !!}</td>
				<td>{!! $value->spreadsheet_to !!}</td>
				<td>{!! $value->start !!}</td>
				<td>{!! $value->mo !!}</td>
				<td>{!! $value->end !!}</td>
				<td><a href="{!! url('edit-service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection