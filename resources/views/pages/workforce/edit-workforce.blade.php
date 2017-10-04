@extends('main')
@section('content')
<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-2">
  			<!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" /> -->
        <img alt="Bootstrap Image Preview" src="/images/avatar.png" />
  		</div>
  		<div class="col-md-10">

        <form class="form-horizontal" action="{{ url('edit-workforce/' . $workforce->id)}}" method="post" enctype="multipart/form-data">
          {!! csrf_field() !!}
        <fieldset>

          <!-- Form Name -->
          <legend>Editar Mão de Obra</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="fullName">Nome completo</label>
            <div class="col-md-10">
            <input id="fullName" name="fullName" type="text" placeholder="Nome completo" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o nome do colaborador.')" oninput="setCustomValidity('')" value="{!! $workforce->fullName !!}">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="name">Identificação</label>
            <div class="col-md-5">
            <input id="name" name="name" type="text" placeholder="Nome ou apelido" class="form-control input-md" required="" data-error="deu merda" value="{!! $workforce->name !!}">

            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="contract">Contrato</label>
            <div class="col-md-5">
              <select id="contract" name="contract" class="form-control">
                <option value="1" {{ $workforce->contract === "1" ? "selected" : "" }}>AT</option>
                <option value="2" {{ $workforce->contract === "2" ? "selected" : "" }}>CONE</option>
                <option value="3" {{ $workforce->contract === "3" ? "selected" : "" }}>MEI</option>
                <option value="4" {{ $workforce->contract === "4" ? "selected" : "" }}>WR</option>
              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="mainPhone">Telefone 1</label>
            <div class="col-md-5">
            <input id="mainPhone" name="mainPhone" type="text" placeholder="Telefone principal" class="form-control input-md" required="" value="{!! $workforce->mainPhone !!}">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="alternativePhone">Telefone 2</label>
            <div class="col-md-5">
            <input id="alternativePhone" name="alternativePhone" type="text" placeholder="Telefone secundário" class="form-control input-md" value="{!! $workforce->alternativePhone !!}">

            </div>
          </div>

          <!-- Button (Double) -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="submit"></label>
            <div class="col-md-5">
              <button id="submit" name="submit" class="btn btn-primary" type="submit">Salvar</button>
              <button id="cancel" name="cancel" class="btn btn-danger">Cancelar</button>
            </div>
          </div>

        </fieldset>
        </form>


  		</div>
  	</div>
  </div>
</body>
@endsection
