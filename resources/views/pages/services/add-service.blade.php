@extends('main')
@section('content')


<style type="text/css">
  .TFtable{
    width:100%; 
    border-collapse:collapse; 
  }
  .TFtable td{ 
    padding:7px; border:#4e95f4 1px solid;
  }
  /* provide some minimal visual accomodation for IE8 and below */
  .TFtable tr{
    background: #b8d1f3;
  }
  /*  Define the background color for all the ODD background rows  */
  .TFtable tr:nth-child(odd){ 
    background: #b8d1f3;
  }
  /*  Define the background color for all the EVEN background rows  */
  .TFtable tr:nth-child(even){
    background: #dae5f4;
  }
</style>

<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-2">
  			<!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/service-140x140.png" />
  		</div>
  		<div class="col-md-10">

        <form class="form-horizontal" action="{{ url('create-service')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Inclusão de Serviços</legend>

          <div class="form-group">
            <label class="col-md-2 control-label" for="service_order">OS</label>
            <div class="col-md-2">
            <input id="service_order" name="service_order" type="text" placeholder="service_order" class="form-control input-md" readonly="true" value="{{ $serviceOrder->so }}">
            </div>
            <input id="serviceOrderId" name="serviceOrderId" type="hidden" class="form-control input-md" value="{{ $serviceOrder->id }}">

            <label class="col-md-2 control-label" for="year">Ano</label>
            <div class="col-md-2">
            <input id="year" name="year" type="text" placeholder="year" class="form-control input-md" readonly="true" value="{{ $serviceOrder->year }}">
            </div>

            <label class="col-md-2 control-label" for="month">Mês</label>
            <div class="col-md-2">
            <input id="month" name="month" type="text" placeholder="month" class="form-control input-md" readonly="true" value="{{ $serviceOrder->month }}">
            </div>
          </div>

          <hr>

          <!-- Select -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="codService">Cód. Serviço</label>
            <div class="col-md-5">
            {{-- <input id="codService" name="codService" type="text" placeholder="código do serviço" class="form-control input-md"> --}}
            <select id="codService" name="codService" class="form-control">
              <option value=null>-- selecione --</option>
            @foreach ($codServices as $codService)
              <option value="{!! $codService->id !!}">{!! $codService->cod . " - " . $codService->description !!}</option>
            @endforeach
            </select>
            </div>

            <label class="col-md-1 control-label" for="status">Status</label>
            <div class="col-md-4">
            <input id="status" name="status" type="text" placeholder="status" class="form-control input-md">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="cod">Solicitante</label>
            <div class="col-md-5">
            <input id="requester" name="requester" type="text" placeholder="requisitante" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="cod">e-mail</label>
            <div class="col-md-4">
            <input id="requester_email" name="requester_email" type="text" placeholder="e-mail" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="spreadsheet_to">Planilha para</label>
            <div class="col-md-5">
            <input id="spreadsheet_to" name="spreadsheet_to" type="text" placeholder="destinatário da planilha" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="start">início</label>
            <div class="col-md-4">
            <input id="start" name="start" type="text" placeholder="início" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="mo">MO</label>
            <div class="col-md-5">
            <input id="mo" name="mo" type="text" placeholder="MO" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="end">Fim</label>
            <div class="col-md-4">
            <input id="end" name="end" type="text" placeholder="fim" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
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

        @if( ! empty($services) )
          <!-- Tabela com as OSs abertas -->
          <table class="table table-bordered table-condensed">
            <thead class="thead-dark">
              <tr>
                <th>COD</th>
                <th>SERVIÇO</th>
                <th>STATUS</th>
                <th colspan="6">Detalhes</th>
                <th colspan="4">Planilha</th>
              </tr>
            </thead>

            <?php $bg = 'lightblue'; ?>

            <?php foreach ($services as $key => $value): ?>
            <?php if ($bg == 'lightblue') {
              $bg = 'white';}
              else {
                $bg = 'lightblue';
              } ?>

            <tr bgcolor="{!! $bg !!}">
              <td rowspan="2" style="vertical-align: middle !important">{!! $value->cod_service !!}</td>
              <td rowspan="2" style="vertical-align: middle !important">{!! $value->description !!}</td>
              <td rowspan="2" style="vertical-align: middle !important">{!! $value->active !!}</td>
              <td>Solicitante</td>
              <td>{!! $value->requirer !!}</td>
              <td>Planilha para</td>
              <td>{!! $value->spreadsheet_to !!}</td>
              <td>MO</td>
              <td>{!! $value->mo !!}</td>
              <td rowspan="2" style="vertical-align: middle !important">x</td>
              <td rowspan="2" style="vertical-align: middle !important">x</td>
              <td rowspan="2" style="vertical-align: middle !important"><a href="{!! url('edit-service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-edit"></span></a></td>
              <td rowspan="2" style="vertical-align: middle !important"><a href="{!! url('delete-service/' . $value->id) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
            <tr bgcolor="{!! $bg !!}">
              <td>E-mail</td>
              <td>{!! $value->email !!}</td>
              <td>Início</td>
              <td>{!! $value->start !!}</td>
              <td>Fim</td>
              <td>{!! $value->end !!}</td>
            </tr>

            <?php endforeach; ?>

          </table>
        @endif
  		</div>
  	</div>
  </div>
</body>
@endsection
