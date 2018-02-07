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
          <legend>Editar Serviços</legend>

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
            @foreach ($codServices as $codService)
              <option value="{!! $codService->id !!}" {!! $codService->id == $service->cod_service_id ? 'selected' : '' !!}>{!! $codService->cod . " - " . $codService->description !!}</option>
            @endforeach
            </select>
            </div>

            <label class="col-md-1 control-label" for="status">Status</label>
            <div class="col-md-4">
            <input id="status" name="status" value="{!! $service->active !!}" type="text" placeholder="status" class="form-control input-md">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="requirer">Solicitante</label>
            <div class="col-md-5">
            <input id="requirer" name="requirer" value="{!! $service->requirer !!}" type="text" placeholder="requisitante" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="email">e-mail</label>
            <div class="col-md-4">
            <input id="email" name="email" value="{!! $service->email !!}" type="text" placeholder="e-mail" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="spreadsheet_to">Planilha para</label>
            <div class="col-md-5">
            <input id="spreadsheet_to" name="spreadsheet_to" value="{!! $service->spreadsheet_to !!}" type="text" placeholder="destinatário da planilha" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="start">início</label>
            <div class="col-md-4">
            <input id="start" name="start" value="{!! $service->start !!}" type="text" placeholder="início" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="mo">MO</label>
            <div class="col-md-5">
            <input id="mo" name="mo" value="{!! $service->mo !!}" type="text" placeholder="MO" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-1 control-label" for="end">Fim</label>
            <div class="col-md-4">
            <input id="end" name="end" value="{!! $service->end !!}" type="text" placeholder="fim" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
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
