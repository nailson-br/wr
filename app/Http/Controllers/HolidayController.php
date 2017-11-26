<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use DateTime;
use Carbon\Carbon;

use App\Holiday;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $holidays = Holiday::all();
        return view('pages.holidays.list-holidays')->with('holidays', $holidays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $holiday = new Holiday();
        // $holiday->holiday = DateTime::createFromFormat('d-m-Y', Input::get('holiday'));
        // echo Input::get('holiday');
        $holiday->holiday = Carbon::createFromFormat('d/m/Y', Input::get('holiday'));
        $holiday->description = Input::get('description');
        $holiday->holiday_type = Input::get('holiday_type');

        $holiday->save();
//         echo Input::get('holiday');
//         dd(Carbon::createFromFormat('d-m-y', Input::get('holiday')));
// dd($holiday->holiday);
        return redirect('list-holidays');
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
        $holiday = Holiday::find($id);
        return view('pages.holidays.edit-holiday')->with('holiday', $holiday);
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
        $holiday = Holiday::find($id);

        if ($holiday->holiday != Input::get('holiday')) {
            $holiday->holiday = Input::get('holiday');
        }

        if ($holiday->description != Input::get('description')) {
            $holiday->description = Input::get('description');
        }

        if ($holiday->holiday_type != Input::get('holiday_type')) {
            $holiday->holiday_type = Input::get('holiday_type');
        }

        $holiday->save();

        // return redirect('visualizar-post/' . $post->id);
        return redirect('list-holidays');
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
        $holiday = Holiday::find($id);
        $holiday->delete();

        return redirect('list-holidays');
    }
}
