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

        <form class="form-horizontal" action="{{ url('edit-wr_user/' . $wr_user->id)}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Editar Usuário WR</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="name">Nome</label>
            <div class="col-md-10">
            <input id="name" name="name" type="text" placeholder="name" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o nome ou apelido.')" oninput="setCustomValidity('')" value="{!! $wr_user->name !!}">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="fullName">Nome completo</label>
            <div class="col-md-5">
            <input id="fullName" name="fullName" type="text" placeholder="Nome completo" class="form-control input-md" required="" data-error="deu merda" value="{!! $wr_user->fullName !!}">
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="wr_user_type">Tipo</label>
            <div class="col-md-5">
              <select id="wr_user_type" name="wr_user_type" class="form-control">
                <option value="admin" {{ $wr_user->wr_user_type === "admin" ? "selected" : "" }}>administrador</option>
                <option value="wr_user" {{ $wr_user->wr_user_type === "wr_user" ? "selected" : "" }}>usuário</option>
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
