@extends('main')
@section('content')
<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-2">
  			<!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/service-140x140.png" />
  		</div>
  		<div class="col-md-10">

        <form class="form-horizontal" action="{{ url('edit-service_order/' . $serviceOrder->id)}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Editar Ordem de Serviço</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="os">OS</label>
            <div class="col-md-10">
            <input id="os" name="os" type="text" placeholder="os" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')" value="{!! $serviceOrder->os !!}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="year">Ano</label>
            <div class="col-md-5">
            <input id="year" name="year" type="text" placeholder="Ano" class="form-control input-md" required="" data-error="deu merda" value="{!! $serviceOrder->year !!}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="month">Mês</label>
            <div class="col-md-5">
            <input id="month" name="month" type="text" placeholder="Mês" class="form-control input-md" required="" data-error="deu merda" value="{!! $serviceOrder->month !!}">
            </div>
          </div>

          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="submit"></label>
            <div class="col-md-5">
              <button id="submit" name="submit" class="btn btn-primary" type="submit">Salvar</button>
              <button id="cancel" name="cancel" class="btn btn-danger" type="button" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
            </div>
          </div>

        </fieldset>
        </form>


  		</div>
  	</div>
  </div>
</body>
@endsection
