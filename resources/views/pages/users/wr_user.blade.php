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

        <form class="form-horizontal" action="{{ url('create-wr_user')}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Usuários do sistema WR</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="fullName">Nome completo</label>
            <div class="col-md-10">
            <input id="fullName" name="fullName" type="text" placeholder="Nome completo" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o código do serviço.')" oninput="setCustomValidity('')">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="name">Identificação</label>
            <div class="col-md-5">
            <input id="name" name="name" type="text" placeholder="Nome ou apelido" class="form-control input-md" required="" data-error="deu merda">
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="wr_user_type">Tipo</label>
            <div class="col-md-5">
              <select id="wr_user_type" name="wr_user_type" class="form-control">
                <option value="admin">administrador</option>
                <option value="wr_user">usuário</option>
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
</body>
@endsection
