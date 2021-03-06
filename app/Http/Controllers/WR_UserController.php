<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;

use App\WR_User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WR_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wr_users = WR_User::all();
        // dd($workforce);
        return view('pages.wr_users.list-wr_users')->with('wr_users', $wr_users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $wr_user = new WR_User();
        $wr_user->fullName = Input::get('fullName');
        $wr_user->name = Input::get('name');
        $wr_user->wr_user_type = Input::get('wr_user_type');

        $wr_user->save();

        return redirect('list-wr_users');
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
        $wr_user = WR_User::find($id);
        return view('pages.wr_users.edit-wr_user')->with('wr_user', $wr_user);
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
        $wr_user = WR_User::find($id);

        if ($wr_user->fullName != Input::get('fullName')) {
            $wr_user->fullName = Input::get('fullName');
        }

        if ($wr_user->name != Input::get('name')) {
            $wr_user->name = Input::get('name');
        }

        if ($wr_user->wr_user_type != Input::get('wr_user_type')) {
            $wr_user->wr_user_type = Input::get('wr_user_type');
        }

        $wr_user->save();

        // return redirect('visualizar-post/' . $post->id);
        return redirect('list-wr_users');
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
        $wr_user = WR_User::find($id);
        $wr_user->delete();

        return redirect('list-wr_users');
    }
}
