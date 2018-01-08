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

        <form class="form-horizontal" action="{{ url('create-service')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Ordens de Serviços</legend>

          <!-- Text input-->
<!--           <div class="form-group">
            <label class="col-md-2 control-label" for="cod">Código</label>
            <div class="col-md-3">
            <input id="cod" name="cod" type="text" placeholder="cod" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">

            </div>
          </div> -->

          <!-- Select -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="description">Serviço</label>
            <div class="col-md-10">
              <select id="description" name="description" class="form-control">
                <?php foreach ($services as $key => $value): ?>
                  <option value="{!! $value->id !!}">{!! $value->description !!}</option>
                <?php endforeach; ?>
              </select>
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
            <label class="col-md-2 control-label" for="spreadsheet">Planilha para início</label>
            <div class="col-md-5">
            <input id="spreadsheet" name="spreadsheet" type="text" placeholder="Planilha para início" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>


          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="mo">MO</label>
            <div class="col-md-4">
            <input id="mo" name="mo" type="text" placeholder="Planilha para início" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
            </div>

            <label class="col-md-2 control-label" for="end">Fim</label>
            <div class="col-md-4">
            <input id="end" name="end" type="text" placeholder="Planilha para início" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">
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
        
        <!-- Tabela com as OSs abertas -->
        <table>
          <th>
            
        </table>


      </div>
    </div>
  </div>
</body>
@endsection
