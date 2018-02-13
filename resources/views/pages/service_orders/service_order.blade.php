@extends('main')
@section('content')
<script type="text/javascript">
  
  function createSONumber() {

    var soField = document.getElementById("service_order");
    var yearField = document.getElementById("year");
    var monthField = document.getElementById("month");

    if (yearField.value == "" || monthField.value == "") {
      soField.value = null;
      document.getElementById("submit").disabled = true;
  } else {
      document.getElementById("submit").disabled = false;
      soField.value = "OS " + yearField.value + monthField.value;  
  }
}

</script>
<body>
  <div class="container-fluid">
    {{-- <div class="row"> --}}
      <div class="col-md-2">
        <!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/service-140x140.png" />
    </div>
    {{-- <div class="col-md-10"> --}}

        <form class="form-horizontal" action="{{ url('create-service_order')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <fieldset>

              <!-- Form Name -->
              <legend>Cadastro de Ordens de Serviços</legend>

              <!-- Select -->
              <div class="form-group">
                <label class="col-md-2 control-label" for="year">Ano</label>
                <div class="col-md-4">
                  <select id="year" name="year" class="form-control" onchange="createSONumber()">
                    <option value="">-- selecione --</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>
            </div>
            
            <label class="col-md-2 control-label" for="month">Mês</label>
            <div class="col-md-4">
              <select id="month" name="month" class="form-control" onchange="createSONumber()">
                <option value="">-- selecione --</option>
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
            <input id="service_order" name="service_order" type="text" class="form-control input-md" placeholder="selecione ano e mês">
        </div>
    </div>

    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-2 control-label" for="submit"></label>
        <div class="col-md-5">
          <button id="submit" name="submit" class="btn btn-primary" type="submit" disabled="true">Salvar</button>
          <button id="cancel" name="cancel" class="btn btn-danger" type="button" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
      </div>
  </div>

</fieldset>
</form>
<hr>

<!-- Tabela com as OSs abertas -->
<table width="100%" border="1px">
  <tr>
    <th style="text-align: center;">COD</th>
    <th style="text-align: center;">SERVIÇO</th>
    <th style="text-align: center;">STATUS</th>
    <th colspan="6" style="text-align: center;">Detalhes</th>
    <th colspan="2" style="text-align: center;">Planilha</th>
</tr>

@if ( ! empty($services))
@foreach($services as $service)
<!-- <tbody style="border-radius: 10px; display: inline-flex; background-color: #c0c0c0"> -->
    <tr style="background-color: #FFFFFF">
      <td rowspan="2" style="text-align: center;">{{ $service->cod }}</td>
      <td rowspan="2">ADMINISTRAÇÃO</td>
      <td rowspan="2" style="text-align: center;">{{ $service->active }}</td>
      <td>Solicitante</td>
      <td>{{ $service->requirer }}</td>
      <td>Planilha para</td>
      <td>{{ $service->spreadsheet_to }}</td>
      <td>MO</td>
      <td>{{ $service->mo }}</td>
      <td rowspan="2" style="text-align: center;">x</td>
      <td rowspan="2" style="text-align: center;">x</td>
  </tr>
  <tr style="background-color: #FFFFFF">
      <td>E-mail</td>
      <td>{{ $service->email }}</td>
      <td>Início</td>
      <td>{{ $service->start }}</td>
      <td>Fim</td>
      <td>{{ $service->end }}</td>
  </tr>
  <!-- </tbody> -->
  @endforeach
  @endif
</table>

</div>
</div>
</div>
</body>
@endsection