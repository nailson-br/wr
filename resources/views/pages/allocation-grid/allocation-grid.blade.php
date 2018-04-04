@extends('main')
@section('content')

	<form class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid">
        	<div class="row">
                <div class="col-md-2">
                    <img alt="Bootstrap Image Preview" src="/images/allocation.png" />
                </div>
                <div class="col-md-10">
                    <legend>Grade de alocação</legend>
                    <div class="row" style="margin-bottom: 25px">
                        <label for="service_order" class="col-md-1 control-label">OS</label>
                        <div class="col-md-3">
                            <select id="service_order" name="service_order" class="form-control">
                                <option value="">-- selecione --</option>
                                <option value="OS 201602">OS 201602</option>
                                <option value="OS 201610">OS 201610</option>
                                <option value="OS 201702">OS 201702</option>
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="day">Dia</label>
                        <div class="col-md-2">
                            <select id="day" name="day" class="form-control">
                                <option value="">-- --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr>
	<table width="100%" border="1px">
		<tr>
			<th style="text-align: center;">SEQ</th>
			<th style="text-align: center;">NOME</th>
			<th style="text-align: center;">CONTR</th>
			<th colspan="6" style="text-align: center;">FUNÇ</th>
			<th colspan="2" style="text-align: center;">ENTR</th>
			<th colspan="2" style="text-align: center;">SAÍDA</th>
			<th colspan="2" style="text-align: center;">OBSERVAÇÃO</th>
			<th colspan="2" style="text-align: center;">OS</th>
			<th colspan="2" style="text-align: center;">SERVIÇO</th>
			<th colspan="2" style="text-align: center;">&nbsp;</th>
			<th colspan="2" style="text-align: center;">&nbsp;</th>
		</tr>

@endsection

@section('post-script')
	<script type="text/javascript">
		$('select[name=service_order]').change(function () {

			// Selecina o elemento Select da OS
			var soField = document.getElementById("service_order");

			// Obtem o ano a partir da string da OS
			// EX: OS 201702 -> 2017
			var selectedYear = parseInt(soField.value.substring(3, 7));

			// Obtem o mês a partir da string da OS
			// EX: OS 201702 -> 1 (janeiro é 0)
			var selectedMonth = parseInt(soField.value.substring(9-2)) - 1;

			// Calcula o último dia do mês/ano
			var lastDay = (new Date(selectedYear, selectedMonth + 1, 0)).getDate();

			// Preenche o Select dos dias
		    $('select[name=day]').empty();
		    if ($(this).val() == "") {
		    	$('select[name=day]').append('<option>-- --</option>');
		    }
		    for (i = 1; i <= lastDay; i++) {
		    	$('select[name=day]').append('<option value=' + i + '>' + i + '</option>');
		    }
		});
	</script>
@endsection