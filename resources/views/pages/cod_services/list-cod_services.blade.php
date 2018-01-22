@extends('main')
@section('content')

<div class="container">
	<table class="table table-striped table-hover table-condensed">
		<tr>
			<th>Código</th>
			<th>Descrição</th>
			<th> </th>
			<th> </th>
		</tr>
		<?php foreach ($codServices as $key => $value): ?>
			<tr>
				<td>{!! $value->cod !!}</td>
				<td>{!! $value->description !!}</td>
				<td><a href="{!! url('edit-cod_service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
				<td><a href="{!! url('delete-cod_service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
@endsection