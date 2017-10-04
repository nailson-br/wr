@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Identificação</th>
			<th>Nome completo</th>
			<th>Contrato</th>
			<th>Telefone 1</th>
			<th>Telefone 2</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($workforce as $key => $value): ?>
			<tr>
				<td>{!! $value->name !!}</td>
				<td>{!! $value->fullName !!}</td>
				<td>{!! $value->contract !!}</td>
				<td>{!! $value->mainPhone !!}</td>
				<td>{!! $value->alternativePhone !!}</td>
				<td><a href="{!! url('edit-workforce/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-workforce/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection