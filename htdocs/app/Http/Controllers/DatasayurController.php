<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\datasayur;
class DatasayurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   $datasayur=datasayur::all();
        return view ('datasayur.index',compact('datasayur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datasayur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        datasayur::create([ 
            'namasayur'=> $request->namasayur,
            'umurpanen'=> $request->umurpanen,
            'nutrisiopt'=> $request->nutrisiopt,
            'suhuopt'=> $request->suhuopt,
            'kelembabanopt'=> $request->kelembabanopt,
            'luxopt'=> $request->luxopt,
        ]);

        return redirect('/datasayur/create')->with('status','Data sayur ditambahkan!');
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
