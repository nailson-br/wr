<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;

use App\Service;
use App\ServiceOrder;
use App\CodService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::All();
        return view('pages.services.list-services')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = new Service();
        $service->service_order_id = Input::get('serviceOrderId');
        $service->cod_service_id = Input::get('codService');
        $service->active = Input::get('status');
        $service->requirer = Input::get('requester');
        $service->email = Input::get('requester_email');
        $service->spreadsheet_to = Input::get('spreadsheet_to');
        $service->start = Input::get('start');
        $service->mo = Input::get('mo');
        $service->end = Input::get('end');
        // $service->description = Input::get('description');

        $service->save();

        $serviceOrder = $service->so;
        $id = $serviceOrder->id;

        return redirect()->to('edit-service_order/' . $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $serviceOrder = $service->so;
        $codServices = CodService::All();
        return view('pages.services.edit-service')->with('service', $service)->with('serviceOrder', $serviceOrder)->with('codServices', $codServices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if ($service->cod_service_id != Input::get('codService')) {
            $service->cod_service_id = Input::get('codService');
        }

        if ($service->active != Input::get('status')) {
            $service->active = Input::get('status');
        }

        if ($service->requirer != Input::get('requirer')) {
            $service->requirer = Input::get('requirer');
        }


        if ($service->email != Input::get('email')) {
            $service->email = Input::get('email');
        }

        if ($service->spreadsheet_to != Input::get('spreadsheet_to')) {
            $service->spreadsheet_to = Input::get('spreadsheet_to');
        }

        if ($service->start != Input::get('start')) {
            $service->start = Input::get('start');
        }

        if ($service->mo != Input::get('mo')) {
            $service->mo = Input::get('mo');
        }

        if ($service->end != Input::get('end')) {
            $service->end = Input::get('end');
        }

        $service->save();

        // return redirect('list-services');
        // retorna usando o id da OS que está num campo hidden da página
        return redirect()->to('edit-service_order/' . Input::get('serviceOrderId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $serviceOrder = $service->so;
        $service->delete();

        // return redirect('list-services');
        return redirect()->to('edit-service_order/' . $serviceOrder->id);
    }

    /** Funções customizadas.
     * Não fazem parte do Controller padrão
     */

    public function addService($services, $serviceOrder) {

    }

    /**
     * Recebe uma serviceOrder e lista os services
     * associados a ela
     */
    public function listServices($id) {

        $serviceOrder = ServiceOrder::find($id);
        $services = $serviceOrder->services();
        return view('pages.services.add-service')->with('services', $services)->with('serviceOrder', $serviceOrder);
    }
}
