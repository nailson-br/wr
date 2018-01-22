<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;

use App\CodService;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codServices = CodService::All();
        return view('pages.cod_services.list-cod_services')->with('codServices', $codServices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codService = new CodService();
        $codService->cod = Input::get('cod');
        $codService->description = Input::get('description');

        $codService->save();

        return redirect('list-cod_services');
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
        $codService = CodService::find($id);
        return view('pages.cod_services.edit-cod_service')->with('codService', $codService);
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
        $codService = CodService::find($id);

        if ($codService->cod != Input::get('cod')) {
            $codService->cod = Input::get('cod');
        }

        if ($codService->description != Input::get('description')) {
            $codService->description = Input::get('description');
        }

        $codService->save();

        return redirect('list-cod_services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $codService = CodService::find($id);
        $codService->delete();

        return redirect('list-cod_services');
    }
}
