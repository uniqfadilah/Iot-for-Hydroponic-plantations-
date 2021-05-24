<?php

namespace App\Http\Controllers;
use App\kipas;
use Illuminate\Http\Request;

class KipasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kipas=kipas::all();
        return view('kipas.index',compact('kipas'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getid=kipas::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='KPS-'.$nota;
        kipas::create([
            'status'=>'0',
            'kode'=>$kode
        ]);
        return back()->with('success','Data Kipas Dibuat');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kipas::destroy($id);
        return back()->with('success','Data Dihapus!');
    }
    
}
