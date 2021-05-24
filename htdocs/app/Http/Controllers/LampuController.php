<?php

namespace App\Http\Controllers;
use App\lampu;
use Illuminate\Http\Request;

class LampuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lampu=lampu::all();
        return view('lampu.index',compact('lampu'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getid=lampu::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='LMP-'.$nota;
        lampu::create([
            'status'=>'0',
            'kode'=>$kode
        ]);
        return back()->with('success','Data Lampu Dibuat');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lampu::destroy($id);
        return back()->with('success','Data Dihapus!');
    }
}
