@extends('main')
@section('content')
<body>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-2">
  			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" />
  		</div>
  		<div class="col-md-10">

        <form class="form-horizontal">
        <fieldset>

          <!-- Form Name -->
          <legend>Cadastro de Mão de Obra</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="fullName">Nome completo</label>
            <div class="col-md-10">
            <input id="fullName" name="fullName" type="text" placeholder="Nome completo" class="form-control input-md" required="" oninvalid="this.setCustomValidity('Insira o nome do colaborador.')" oninput="setCustomValidity('')">

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
            <label class="col-md-2 control-label" for="contract">Contrato</label>
            <div class="col-md-5">
              <select id="contract" name="contract" class="form-control">
                <option value="1">AT</option>
                <option value="2">CONE</option>
                <option value="3">MEI</option>
                <option value="4">WR</option>
              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="phone1">Telefone 1</label>
            <div class="col-md-5">
            <input id="phone1" name="phone1" type="text" placeholder="Telefone principal" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-2 control-label" for="phone2">Telefone 2</label>
            <div class="col-md-5">
            <input id="phone2" name="phone2" type="text" placeholder="Telefone secundário" class="form-control input-md">

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
