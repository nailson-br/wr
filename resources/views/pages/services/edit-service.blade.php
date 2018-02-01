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

        <form class="form-horizontal" action="{{ url('edit-service/' . $service->id)}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Editar Serviço</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="cod">Código</label>
            <div class="col-md-10">
            <input id="cod" name="cod" type="text" placeholder="cod" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')" value="{!! $service->cod !!}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Descrição</label>
            <div class="col-md-5">
            <input id="description" name="description" type="text" placeholder="Descrição do serviço" class="form-control input-md" required="" data-error="deu merda" value="{!! $service->description !!}">
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
