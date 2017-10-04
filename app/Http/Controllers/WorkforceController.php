<?php

namespace App\Http\Controllers;

use Input;

use Illuminate\Http\Request;

use App\Workforce;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkforceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $workforce = Workforce::all();
        // dd($workforce);
        return view('pages.workforce.list-workforce')->with('workforce', $workforce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(Input::all());

        $workforce = new Workforce();
        $workforce->fullName = Input::get('fullName');
        $workforce->name = Input::get('name');
        $workforce->contract = Input::get('contract');
        $workforce->mainPhone = Input::get('mainPhone');
        $workforce->alternativePhone = Input::get('alternativePhone');

        $workforce->save();

        return redirect('list-workforce');

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
        $workforce = Workforce::find($id);
        return view('pages.workforce.edit-workforce')->with('workforce', $workforce);
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
        $workforce = Workforce::find($id);

        if ($workforce->fullName != Input::get('fullName')) {
            $workforce->fullName = Input::get('fullName');
        }

        if ($workforce->name != Input::get('name')) {
            $workforce->name = Input::get('name');
        }

        if ($workforce->contract != Input::get('contract')) {
            $workforce->contract = Input::get('contract');
        }

        if ($workforce->mainPhone != Input::get('mainPhone')) {
            $workforce->mainPhone = Input::get('mainPhone');
        }

        if ($workforce->alternativePhone != Input::get('alternativePhone')) {
            $workforce->alternativePhone = Input::get('alternativePhone');
        }

        $workforce->save();

        // return redirect('visualizar-post/' . $post->id);
        return redirect('list-workforce');
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
        $workforce = Workforce::find($id);
        $workforce->delete();

        return redirect('list-workforce');
    }
}
