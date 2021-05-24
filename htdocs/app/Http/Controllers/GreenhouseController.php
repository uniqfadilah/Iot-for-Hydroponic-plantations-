<?php

namespace App\Http\Controllers;
use App\greenhouse;
use App\datasayur;
use App\kipas;
use App\volumeair;
use App\lampu;
use App\kelembaban;
use Carbon\Carbon;
use App\datatanam;
use App\pesan;
use App\loglampu;
use App\logkipas;
use App\logpompa;
use App\suhu;
use App\lux;
use App\pompa;
use App\laporan;
use App\hasilpanen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GreenhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {   
            $greenhouse=greenhouse::all();
            return view ('greenhouse.index',compact('greenhouse'));
    }
    public function pegawaihalaman(greenhouse $greenhouse)
        {   
            return view ('greenhouse.indexpegawai',compact('greenhouse'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show(greenhouse $greenhouse)
    
    {
    if($greenhouse->status=='1'){
    $volumepengisian=$greenhouse->tandon->volumeair['volume'];
    $volumetandon=$greenhouse->tandon->volume_tandon;
    $prediksi=$greenhouse->datatanam->prediksipanen;
    $getumur=$greenhouse->datatanam['created_at'];
    $gr=$greenhouse->id;
    $laporan=$greenhouse->laporan;
    $laporans=$laporan->groupBy(function($date) {
        return Carbon::parse($date->created_at)->format('d M Y');
    });
   
    $gettime=Carbon::now();
    $umur=$getumur->diffInDays($gettime);
    $getprediksi=$gettime->diffInDays($prediksi);
    $bar=($umur/$greenhouse->datasayur['umurpanen'])*100;
    $wktprediksi=$prediksi->isoFormat('DD MMMM YYYY');
    $waktusuhu=$prediksi->format('d-M-Y');
    $pesan=$greenhouse->pesan;
    $suhu=$greenhouse->termometer->suhu;
    $getloglampu=loglampu::where('lampu_id', $greenhouse->lampu_id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
    $getlogpompa=logpompa::where('pompa_id', $greenhouse->tandon->pompa->id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
    $getlogkipas=logkipas::where('kipas_id', $greenhouse->kipas_id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
        return view('greenhouse.show',compact('greenhouse','laporans','laporan','getprediksi','wktprediksi','volumetandon','volumepengisian',
        'pesan','suhu','getloglampu','getlogkipas','gettime','umur','bar','getlogpompa'));
    }
    else{
    return back();
    }
    }
    public function pegawai(greenhouse $greenhouse)
    
    {
    if($greenhouse->status=='1'){
        $volumepengisian=$greenhouse->tandon->volumeair['volumeair'];
        $volumetandon=$greenhouse->tandon->volume_tandon;
        $logtandon=logpompa::where('pompa_id', $greenhouse->tandon->pompa->id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
        $prediksi=$greenhouse->datatanam->prediksipanen;
        $getumur=$greenhouse->datatanam['created_at'];
        $gettime=Carbon::now();
        $umur=$getumur->diffInDays($gettime);
        $getprediksi=$gettime->diffInDays($prediksi);
        $bar=($umur/$greenhouse->datasayur['umurpanen'])*100;
        $wktprediksi=$prediksi->format('d-M-Y');
        $waktusuhu=$prediksi->format('d-M-Y');
        $pesan=$greenhouse->pesan;
        $suhu=$greenhouse->termometer->suhu;
        $getloglampu=loglampu::where('lampu_id', $greenhouse->lampu_id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
        $getlogkipas=logkipas::where('kipas_id', $greenhouse->kipas_id)->where('created_at','>=',$greenhouse->datatanam->created_at)->orderBy('id','desc')->get();
        return view('greenhouse.showdetail',compact('greenhouse','getprediksi','wktprediksi','volumetandon','volumepengisian',
        'pesan','suhu','getloglampu','getlogkipas','gettime','umur','bar','logtandon'));
    }
    else{
    return back();
    }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(greenhouse $greenhouse)

    {  $datasayur=datasayur::all();
        return view('greenhouse.edit',compact('greenhouse','datasayur'));
    }
    public function laporan(greenhouse $greenhouse, Request $request)

    { 
        $validator = Validator::make($request->all(),[
            'jenis'=>'required',
            'ket'=>'required',
            'gambar'=>'image|mimes:jpeg,png,jpg',
            'detail'=>'required',
        ]);
            if($validator->fails()){
                return back()->with('warning','Form Pengisian salah');
            }
        $tujuan='dist/img/laporan';
        $gambar=$request->file('gambar');
        $namagambar=$gambar->getClientOriginalName();
        $gambar->move($tujuan,$namagambar);
      

            laporan::create([ 
            'greenhouse_id'=> $greenhouse->id,
            'jenislaporan'=> $request->jenis,
            'keterangan'=> $request->ket,
            'gambar'=> $namagambar,
            'detail'=> $request->detail,
        ]);
        return back()->with('success','Laporan  Terkirim');
    }
    
    public function geton(greenhouse $greenhouse)

    {  $datasayur=datasayur::all();
        return view('greenhouse.edit',compact('greenhouse','datasayur'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hasilpanen $hasilpanen)
    {
    }
    
    public function nonaktif(Request $request, greenhouse $greenhouse)
    {
       greenhouse::where('id', $greenhouse->id)
       ->update([
           'status'=>'0'
       ]);
       volumeair::where('tandon_id', $greenhouse->tandon_id)->delete();
       suhu::where('termometer_id', $greenhouse->termometer['id'])->delete();
       kelembaban::where('termometer_id', $greenhouse->termometer['id'])->delete();
       lux::where('luxmeter_id', $greenhouse->luxmeter['id'])->delete();
       pesan::where('greenhouse_id', $greenhouse['id'])->delete();
       laporan::where('greenhouse_id', $greenhouse['id'])->delete();
       kipas::where('id', $greenhouse->kipas['id'])
       ->update([
           'status'=>'0'
       ]);
       lampu::where('id', $greenhouse->lampu['id'])
       ->update([
           'status'=>'0'
       ]);
       pompa::where('id', $greenhouse->tandon->pompa['id'])
       ->update([
           'status'=>'0'
       ]);
       return redirect('/greenhouse')->with('success', $greenhouse->kode.' Dinonaktifkan');
    }
    public function getonn(Request $request,greenhouse $greenhouse, datasayur $datasayur)
    {  $umur=datasayur::where('id', '=', $request->sayur)->get();
        foreach($umur as $gu){
            $getumur=$gu->umurpanen;
        }
        $getid=$greenhouse->id;
        $gettime=Carbon::now();
        $getstime=$gettime->addDays($getumur);
        
        datatanam::create([ 
            'greenhouse_id'=> $greenhouse->id,
            'datasayur_id'=> $request->sayur,
            'prediksipanen'=>$getstime
        ]);

       greenhouse::where('id', $greenhouse->id)
       ->update([
           'datasayur_id'=> $request->sayur,
           'status'=>'1'
       ]);
      
       return redirect()->action('GreenhouseController@show',['greenhouse'=>$getid])->with('success', $greenhouse->kode.' Mulai Menanam');
    }
    public function inputpanen(Request $request, greenhouse $greenhouse)
    {
        $validator = Validator::make($request->all(),[
            'hasil'=>'required'
        ]);
            if($validator->fails()){
                return back()->with('warning','Fild Kosong');
            }
        hasilpanen::create([ 
            'greenhouse_id'=> $greenhouse->id,
            'datasayur_id'=> $greenhouse->datasayur_id,
            'hasilpanen'=> $request->hasil,
        ]);
       return back()->with('status','Hasil ditambahkan!')->with('success', "Hasil Panen ".$request->hasil."Kg ditambahkan");
    }
    public function pesanadmin(Request $request, greenhouse $greenhouse)
    {
        pesan::create([ 
            'greenhouse_id'=> $greenhouse->id,
            'pengirim'=> '0',
            'pesan'=> $request->pesan,
        ]);


       return back()->with('toast_success','pesan terkirim');
    }
    public function pesanpegawai(Request $request, greenhouse $greenhouse)
    {
        pesan::create([ 
            'greenhouse_id'=> $greenhouse->id,
            'pengirim'=> '1',
            'pesan'=> $request->pesan,
        ]);


       return back()->with('toast_success','pesan terkirim');
    }


    /**
     * Remove the specified resource from storage.web
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function api(Request $request)
    {
        $c=greenhouse::where('id',$request->id)->first();
            return response()->json([
                "suhu"=>$c->termometer->getsuhu['suhu'],
                "kelembaban"=>$c->termometer->kelembaban['kelembaban'],
                "suhuopt"=>$c->datasayur->suhuopt,
                "luxopt"=>$c->datasayur->luxopt,
                "lux"=>$c->luxmeter->getlux['lux'],
                "vt"=>round($c->tandon->volumeair['volume']/$c->tandon->volume_tandon*100),
                "pompa"=>$c->tandon->pompa['status'],
                "kelembabanopt"=>$c->datasayur->kelembabanopt,
                "kipas"=>$c->kipas->status,
                "lampu"=>$c->lampu['status'],
            ]);
    }
    public function apikelembaban(Request $request)
    {
        $c=greenhouse::where('id',$request->id)->first();
            return response()->json([
                "kelembaban"=>$c->termometer->kelembaban['kelembaban'],
                "kelembabanopt"=>$c->datasayur->kelembabanopt,
            ]);
    }
}
