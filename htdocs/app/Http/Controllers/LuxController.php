<?php

namespace App\Http\Controllers;
use App\luxmeter;
use Illuminate\Http\Request;

class LuxController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luxmeter=luxmeter::all();
        return view('lux.index',compact('luxmeter'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getid=luxmeter::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='LXM-'.$nota;
        luxmeter::create([
            'status'=>'0',
            'kode'=>$kode
        ]);
        return back()->with('success','Data luxmeter Dibuat');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        luxmeter::destroy($id);
        return back()->with('success','Data Dihapus!');
    }
}
