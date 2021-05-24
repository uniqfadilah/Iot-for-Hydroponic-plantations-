<?php

namespace App\Http\Controllers;
use App\termometer;
use Illuminate\Http\Request;

class TermoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termometer=termometer::all();
        return view('termometer.index',compact('termometer'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getid=termometer::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='TRM-'.$nota;
        termometer::create([
            'status'=>'0',
            'kode'=>$kode
        ]);
        return back()->with('success','Data termometer Dibuat');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        termometer::destroy($id);
        return back()->with('success','Data Dihapus!');
    }
}
