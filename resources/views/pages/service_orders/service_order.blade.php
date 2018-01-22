@extends('main')
@section('content')
<script type="text/javascript">
  
  function createOSNumber() {
    var osField = document.getElementById("service_order");
    var yearField = document.getElementById("year");
    var monthField = document.getElementById("month");

    // alert(yearField.value + monthField.value);

    osField.value = "OS " + yearField.value + monthField.value;
  }

</script>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/service-140x140.png" />
      </div>
      <div class="col-md-10">

        <form class="form-horizontal" action="{{ url('create-service_order')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Ordens de Serviços</legend>

          <!-- Select -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="year">Ano</label>
            <div class="col-md-4">
              <select id="year" name="year" class="form-control" onchange="createOSNumber()">
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018" selected="true">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>
            
             <label class="col-md-2 control-label" for="month">Mês</label>
            <div class="col-md-4">
              <select id="month" name="month" class="form-control" onchange="createOSNumber()">
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
              </select>
            </div>

          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="service_order">Número da OS</label>
            <div class="col-md-4">
            <input id="service_order" name="service_order" type="text" class="form-control input-md">
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

        <hr>
      </div>
    </div>
  </div>
</body>
@endsection
