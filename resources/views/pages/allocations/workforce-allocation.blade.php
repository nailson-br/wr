@extends('main')
@section('content')

<body>
    <form class="form-horizontal" action="{{ url('workforce-allocate')}}" method="post" enctype="multipart/form-data">
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
                                @foreach ($serviceOrders as $so)
                                    <option value="{{ $so->so }}">{{ $so->so }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="name">Nome</label>
                        <div class="col-md-3">
                            <select id="name" name="name" class="form-control">
                                <option value="">-- selecione --</option>
                                    @foreach ($workforces as $workforce)
                                        <option value="{{ $workforce->name }}">{{ $workforce->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <label class="col-md-1 control-label" for="service">Serviço</label>
                        <div class="col-md-3">
                            <select id="service" name="service" class="form-control">
                                <option value="">-- selecione --</option>
                                    @foreach ($codServices as $codService)
                                        <option value="{{ $codService->cod . ' - ' . $codService->description}}">{{ $codService->cod . ' - ' . $codService->description}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <legend class="bg-success" style="padding-left: 4px">Período de alocação</legend>
                            <div class="row">
                                <label class="col-md-2 control-label" for="start_date">início</label>
                                <div class="col-md-4">
                                    <input id="start_date" name="start_date" type="date" placeholder="Início" class="form-control input-md" >
                                </div>
                                <label class="col-md-2 control-label" for="end_date">término</label>
                                <div class="col-md-4">
                                    <input id="end_date" name="end_date" type="date" placeholder="Fim" class="form-control input-md" >
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 control-label" for="start_time">início</label>
                                <div class="col-md-4">
                                    <input id="start_time" name="start_time" type="time" placeholder="Início" class="form-control input-md" >
                                </div>
                                <label class="col-md-2 control-label" for="end_time">término</label>
                                <div class="col-md-4">
                                    <input id="end_time" name="end_time" type="time" placeholder="Fim" class="form-control input-md" >
                                </div>
                            </div>
                            <div class="row" style="padding-top: 20px">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <button id="submit" name="submit" class="btn btn-primary" type="submit">Salvar</button>
                                    <button id="cancel" name="cancel" class="btn btn-danger" type="button" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <legend class="bg-success" style="padding-left: 4px">Incluir</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="saturdays" id="saturdays">sábados</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="sundays" id="sundays">domingos</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="holidays" id="holidays">feriados</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="bridges" id="bridges">dias ponte</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

@endsection
