<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\ServiceOrder;
use App\CodService;
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
        // $serviceOrders = ServiceOrder::All();
        /*
         * Devido a um bug no Laravel, ordenação por múltiplas colunas não
         * será feita usando o método All() padrão.
         * 
         */
        $serviceOrders = DB::table('service_orders')->select('*')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->get();
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
        $services = DB::table('services')->join('cod_services', function ($join) use($serviceOrder) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.service_order_id', '=', $serviceOrder->id);})->select('cod_services.cod as cod_service','cod_services.description as description','services.*')->get();

        // return view('pages.services.add-service')->with('serviceOrder', $serviceOrder)->with('services', $services);
        return redirect()->to('edit-service_order/' . $serviceOrder->id);
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
        $codServices = CodService::All();
        $serviceOrder = ServiceOrder::find($id);
        $services = DB::table('services')->join('cod_services', function ($join) use($serviceOrder) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.service_order_id', '=', $serviceOrder->id);})->select('cod_services.cod as cod_service','cod_services.description as description','services.*')->get();
        return view('pages.services.add-service')->with('serviceOrder', $serviceOrder)->with('services', $services)->with('codServices', $codServices);
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
