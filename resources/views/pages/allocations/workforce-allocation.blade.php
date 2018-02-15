@extends('main')
@section('content')

<body>
    <form class="form-horizontal" action="{{ url('create-workforce')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <img alt="Bootstrap Image Preview" src="/images/avatar.png" />
                </div>
                <div class="col-md-10">
                    <legend>Alocação de mão de obra</legend>
                    <div class="row" style="margin-bottom: 25px">
                        <label for="os" class="col-md-1 control-label">OS</label>
                        <div class="col-md-3">
                            <select id="os" name="os" class="form-control">
                                <option value="">-- selecione --</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="name">Nome</label>
                        <div class="col-md-3">
                            <select id="name" name="name" class="form-control">
                                <option value="">-- selecione --</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="service">Serviço</label>
                        <div class="col-md-3">
                            <select id="service" name="service" class="form-control">
                                <option value="">-- selecione --</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <legend class="bg-success" style="padding-left: 4px">Período de alocação</legend>
                            <div class="row">
                                <label class="col-md-2 control-label" for="start">Início</label>
                                <div class="col-md-4">
                                    <input id="start" name="start" type="text" placeholder="Início" class="form-control input-md" required="">
                                </div>
                                <label class="col-md-2 control-label" for="end">Fim</label>
                                <div class="col-md-4">
                                    <input id="end" name="end" type="text" placeholder="Fim" class="form-control input-md" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="bg-success" style="padding-left: 4px">Incluir</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">sábados</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">domingos</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">feriados</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">dias ponte</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

@endsection
