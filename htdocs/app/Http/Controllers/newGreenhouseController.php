<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\greenhouse;
use App\tandon;
use App\termometer;
use App\kipas;
use App\luxmeter;
use App\lampu;
use App\penanggungjawab;
use Illuminate\Http\Request;

class newGreenhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $greenhouse=greenhouse::all();
        $tandon=tandon::all();
        $kipas=kipas::all();
        $termo=termometer::all();
        $pegawai=penanggungjawab::all();
        $lampu=lampu::all();
        $lux=luxmeter::all();
        return view('newgh.index',compact('greenhouse','tandon','pegawai','kipas','termo','lampu','lux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'tandon'=>'required',
            'termo'=>'required',
            'kipas'=>'required',
            'lampu'=>'required',
            'pegawai'=>'required',
            'lux'=>'required'
        ]);
            if($validator->fails()){
                return back()->with('warning','Fild Kosong');
            }
        $getid=greenhouse::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='GH-'.$nota;
        greenhouse::create([
            'kode'=>$kode,
            'tandon_id'=>$request->tandon,
            'termometer_id'=>$request->termo,
            'luxmeter_id'=>$request->lux,
            'lampu_id'=>$request->lampu,
            'kipas_id'=>$request->kipas,
            'penanggungjawab_id'=>$request->pegawai,
            'status'=>'0'
        ]);
        return back()->with('success','Data Pompa Dibuat');
    }

    public function data(Request $request){
        $greenhouse=greenhouse::all();
        return response()->json($greenhouse);
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
