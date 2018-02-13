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

            <form class="form-horizontal" action="{{ url('create-workforce')}}" method="post" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <legend>Alocação de Mão de Obra</legend>
              <fieldset>

                  <!-- Select -->
                  <div class="form-group">
                    <label class="col-md-1 control-label" for="year">OS</label>
                    <div class="col-md-3">
                      <select id="year" name="year" class="form-control" onchange="createSONumber()">
                        <option value="">-- selecione --</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>
                </div>

                <label class="col-md-1 control-label" for="year">Nome</label>
                <div class="col-md-3">
                  <select id="year" name="year" class="form-control" onchange="createSONumber()">
                    <option value="">-- selecione --</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>
            </div>

            <label class="col-md-1 control-label" for="year">Serviço</label>
            <div class="col-md-3">
              <select id="year" name="year" class="form-control" onchange="createSONumber()">
                <option value="">-- selecione --</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                </select>
            </div>
        </div>
</fieldset>



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
    <label class="col-md-2 control-label" for="mainPhone">Telefone 1</label>
    <div class="col-md-5">
        <input id="mainPhone" name="mainPhone" type="text" placeholder="Telefone principal" class="form-control input-md" required="">

    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-2 control-label" for="alternativePhone">Telefone 2</label>
    <div class="col-md-5">
        <input id="alternativePhone" name="alternativePhone" type="text" placeholder="Telefone secundário" class="form-control input-md">

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
