<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WR</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ url('create-workforce')}}">Cadastrar mão de obra <span class="sr-only">(current)</span></a></li>
        <li><a href="{{ url('list-workforce') }}">Listar Mão de Obra</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operação <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('create-cod_service')}}">Cadastro de Código de Serviço</a></li>
            <li><a href="{{ url('list-cod_services')}}">Listagem de Códigos de Serviço</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('create-service')}}">Cadastro de Serviço</a></li>
            <li><a href="{{ url('list-services')}}">Listagem de Serviço</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('create-service_order')}}">Cadastro de Ordens de Serviço</a></li>
            <li><a href="{{ url('list-service_orders')}}">Listagem de Ordens Serviço</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('create-holiday')}}">Cadstro de Feriados</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('create-wr_user')}}">Cadastro de usuários</a></li>
            <li><a href="{{ url('create-workforce')}}">Cadastro de Mão de Obra</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('list-workforce') }}">Listar Mão de Obra</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
