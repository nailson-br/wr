@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Identificação</th>
			<th>Nome completo</th>
			<th>Tipo</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($wr_users as $key => $value): ?>
			<tr>
				<td>{!! $value->name !!}</td>
				<td>{!! $value->fulName !!}</td>
				<td>{!! $value->wr_user_type !!}</td>
				<td><a href="{!! url('edit-wr_user/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-wr_user/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection