<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ServiceOrder;
use App\Service;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $serviceOrders = ServiceOrder::All();
        return view('pages.service_orders.service_order')->with('serviceOrders', $serviceOrders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $serviceOrder = new ServiceOrder();
        $serviceOrder->so = Input::get('so');
        $serviceOrder->month = Input::get('month');
        $serviceOrder->year = Input::get('year');

        $serviceOrder->save();

        // objeto "serviço" para listar os serviços associados à OS
        $services = $serviceOrder->services();

        return redirect('list-service_orders')->with('services', $services);
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
        //
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
        //
        $serviceOrder = ServiceOrder::find($id);

        if ($serviceOrder->so != Input::get('so')) {
            $serviceOrder->so = Input::get('so');
        }

        if ($serviceOrder->year != Input::get('year')) {
            $serviceOrder->year = Input::get('year');
        }

        if ($serviceOrder->month != Input::get('month')) {
            $serviceOrder->month = Input::get('month');
        }

        $serviceOrder->save();

        return redirect('list-service_orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
