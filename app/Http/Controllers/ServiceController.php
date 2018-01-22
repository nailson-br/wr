<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;

use App\Service;
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
        $service->service_order_id = Input::get('service_order_id');
        $service->active = Input::get('active');
        $service->requirer = Input::get('requirer');
        $service->email = Input::get('email');
        $service->spreadsheet_to = Input::get('spreadsheet_to');
        $service->start = Input::get('start');
        $serivce->mo = Input::get('mo');
        $service->end = Input::get('end');
        $service->description = Input::get('description');

        $service->save();

        return redirect('list-services');
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
        return view('pages.services.edit-service')->with('service', $service);
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

        if ($service->service_order_id != Input::get('service_order_id')) {
            $service->service_order_id = Input::get('service_order_id');
        }

        if ($service->active != Input::get('active')) {
            $service->active = Input::get('active');
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

        return redirect('list-services');
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
        $service->delete();

        return redirect('list-services');
    }
}
