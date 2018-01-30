<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;

use App\ServiceOrder;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
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
        return view('pages.service_orders.list-service_orders')->with('serviceOrders', $serviceOrders);
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
        $serviceOrder->so = Input::get('service_order');
        $serviceOrder->month = Input::get('month');
        $serviceOrder->year = Input::get('year');

        $serviceOrder->save();
        $services = $serviceOrder->services;
        // $services = $serviceOrder->services;
        // dd($services);

        // return redirect('list-service_orders')->with('services', $services);
        // return redirect('add-service')->with('services', $services);
        // return Redirect::action('App\Http\Controllers\ServiceController@listServices', [$serviceOrder]);
        // return response()->redirectToAction('ServiceController@listServices', [$serviceOrder]);
        // return Redirect::route('list-services')->with('serviceOrder', $serviceOrder);
        // return view('pages.services.add-service')->with('serviceOrder', $serviceOrder)->with('services',$services);
        return view('pages.services.add-service')->with('serviceOrder', $serviceOrder)->with('services', $services);
        // return view('pages.testes.testes')->with('serviceOrder', $serviceOrder)->with('services', $services);
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
        $serviceOrder = ServiceOrder::find($id);
        $serviceOrder->delete();

        return redirect('list-service_orders');
    }

    /**
     * Adiciona serviços para a SO indicada passada em $order
     * Retorn
     */
    public function addService($order) {

    }
}
