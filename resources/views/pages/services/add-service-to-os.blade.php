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
          <legend>Inclusão de Serviços</legend>

          <div class="form-group">
            <label class="col-md-2 control-label" for="os">OS</label>
            <div class="col-md-2">
            <input id="os" name="os" type="text" placeholder="os" class="form-control input-md" readonly="true" value="201801">
            </div>

            <label class="col-md-2 control-label" for="year">Ano</label>
            <div class="col-md-2">
            <input id="year" name="year" type="text" placeholder="year" class="form-control input-md" readonly="true" value="2018">
            </div>

            <label class="col-md-2 control-label" for="month">Mês</label>
            <div class="col-md-2">
            <input id="month" name="month" type="text" placeholder="month" class="form-control input-md" readonly="true" value="Janeiro">
            </div>
          </div>

          <hr>

          <!-- Select -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="codService">Cód. Serviço</label>
            <div class="col-md-5">
            <input id="codService" name="codService" type="text" placeholder="código do serviço" class="form-control input-md">
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

        <!-- Tabela com as OSs abertas -->
        <table width="100%" border="1px">
          <tr>
            <th style="text-align: center;">COD</th>
            <th style="text-align: center;">SERVIÇO</th>
            <th style="text-align: center;">STATUS</th>
            <th colspan="6" style="text-align: center;">Detalhes</th>
            <th colspan="2" style="text-align: center;">Planilha</th>
          </tr>
          <tr style="background-color: #FFFFFF">
            <td rowspan="2" style="text-align: center;">150601</td>
            <td rowspan="2">ADMINISTRAÇÃO</td>
            <td rowspan="2" style="text-align: center;">ATIVO</td>
            <td>Solicitante</td>
            <td> </td>
            <td>Planilha para</td>
            <td> </td>
            <td>MO</td>
            <td> </td>
            <td rowspan="2" style="text-align: center;">x</td>
            <td rowspan="2" style="text-align: center;">x</td>
          </tr>
          <tr style="background-color: #FFFFFF">
            <td>E-mail</td>
            <td> </td>
            <td>Início</td>
            <td> </td>
            <td>Fim</td>
            <td> </td>
          </tr>

          <tr style="background-color: #CBCEFB">
            <td rowspan="2" >150601</td>
            <td rowspan="2">ADMINISTRAÇÃO</td>
            <td rowspan="2">ATIVO</td>
            <td>Solicitante</td>
            <td></td>
            <td>Planilha para</td>
            <td></td>
            <td>MO</td>
            <td></td>
            <td rowspan="2">x</td>
            <td rowspan="2">x</td>
          </tr>

          <tr style="background-color: #CBCEFB">
            <td>E-mail</td>
            <td></td>
            <td>Início</td>
            <td></td>
            <td>Fim</td>
            <td></td>
          </tr>

        </table>
  		</div>
  	</div>
  </div>
</body>
@endsection
