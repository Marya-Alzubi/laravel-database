<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class user2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = User::all();
        return view("users.create", compact("rows"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [

            'email'    =>"required",
            'password' =>"required",
            'mobile'   =>"required",
            'fname'    =>"required"

        ]);
        User::create($request->all());
        return redirect("/users" );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $row = User::findOrFail($id);
//        view("users.show" , compact("row" ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = User::findOrFail($id);
        return view('users.edit' , compact('row'));
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
        $row = User::findOrFail($id);
        $row->update($request->all());
        return redirect("/users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        where("userid", $id)  YES   /////////////   whereUserid($id) YES   //// whereId($id)  NO   will didnot work because the column name in database is userid
        User::findOrFail($id)->delete();
        return redirect("/users");
    }
}
