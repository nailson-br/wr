Página de testes
<hr>
@if (count($services) > 1)
	Existem mais de um serviços
@endif
@foreach ($services as $service)
          <p>Nome:	{{!! $service->requirer !!}}</p>
@endforeach
<p>Service Order: {{!! $serviceOrder->id !!}}