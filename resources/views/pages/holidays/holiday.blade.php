@extends('main')
@section('content')
<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.pt-BR.min.js"></script>
<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-2">
  			<!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/holiday-140x140.png" />
  		</div>
  		<div class="col-md-10">

        <form class="form-horizontal" action="{{ url('create-holiday')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Feriados e Dias-Ponte</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="holiday">Data</label>
            <div class="input-group date col-md-5" style="padding-left: 15px ;padding-right: 15px;">
                <input id="holiday" name="holiday" type="text" placeholder="dd/mm/aaaa" class="form-control" readonly="" oninvalid="this.setCustomValidity('Insira a data do feriado.')" oninput="setCustomValidity('')">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Descrição</label>
            <div class="col-md-5">
              <input id="description" name="description" type="text" placeholder="Descrição" class="form-control input-md" required="" data-error="deu merda">
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="holiday_type">Tipo</label>
            <div class="col-md-5">
              <select id="holiday_type" name="holiday_type" class="form-control">
                <option value="holiday">feriado</option>
                <option value="bridge">dia-ponte</option>
              </select>
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
  <script type="text/javascript">
    // referência: https://www.youtube.com/watch?v=M7AsS4oTk78
    $('#holiday').datepicker({
        format: "dd/mm/yyyy",
        language: "pt-BR",
        autoclose: true
    });
  </script>
</body>
@endsection
