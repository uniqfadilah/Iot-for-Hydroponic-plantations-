<?php

namespace App\Http\Controllers;
use App\Events\suhuWasCreated;
use App\greenhouse;
use Carbon\Carbon;
use App\termometer;
use App\volumeair;
use App\kelembaban;
use App\tandon;
use App\logpompa;
use App\logkipas;
use App\loglampu;
use App\luxmeter;
use App\pompa;
use App\kipas;
use App\lampu;
use App\suhu;
use App\lux;
use Illuminate\Http\Request;

class simulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata(greenhouse $greenhouse)
    {
        return response()->json([
            "status"=>$greenhouse->status,
            "Kode"=>$greenhouse->kode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function arduino(Request $request, greenhouse $greenhouse)
    {    
        if($greenhouse->status=='1'){
            
        $tinggiairreal = 20-$request->ketinggianair;
        $diameter=$greenhouse->tandon['volume_tandon']/($greenhouse->tandon['tinggitandon']*3.14);
        $volume=round($tinggiairreal*3.14*$diameter);
        $tinggiair=$greenhouse->tandon['tinggitandon']-$request->ketinggianair;
        $suhuoptimal=$greenhouse->datasayur->suhuopt;
        $getnutrisiopt=$greenhouse->datasayur->nutrisiopt;
        $getvolume=$greenhouse->tandon['volume_tandon'];
        $total=$getnutrisiopt*$getvolume/100;
        $forhighsuhu=$total*0.05;
        if($request->suhu<$suhuoptimal){
            $pengisiannutrisi=$total;
        }
        else{
            $pengisiannutrisi=$total-$forhighsuhu;
        };
        if($volume != $greenhouse->tandon->volumeair['volume']){
            $tandonid=$greenhouse->tandon['id'];
            $pompaid=$greenhouse->tandon->pompa['id'];
            volumeair::create([ 
                'tandon_id'=>$tandonid,
                'volume'=> $volume,
            ]);
            if(($tinggiairreal<=2)&&($greenhouse->tandon->pompa['status']=='0')){
            $pompa=pompa::where('id', $pompaid)
               ->update([
                   'status'=>'1'
               ]);
               $logs=logpompa::create([ 
                'pompa_id'=>$pompaid,
                'total_nutrisi'=> $pengisiannutrisi,
      
            ]);
            }             
            else if($volume>=$getvolume && $greenhouse->tandon->pompa['status']=='1'){
            $pompa=pompa::where('id', $pompaid)
            ->update([
                'status'=>'0'
            ]);
                $idlog=$greenhouse->tandon->pompa->logpompa->id;
                logpompa::where('id', $idlog)->update([ 
                'pompa_id'=>$pompaid,
            ]);
            

        }
       
    };
        //pengelolaan intensitas cahaya
        $Vout=$request->lux*0.0048828125;
        $ldr=(2500/$Vout-500)/10;
        $lux=round($ldr); 

    if($lux != $greenhouse->luxmeter->getlux['lux']){
        lux::create([ 
            'luxmeter_id'=>$greenhouse->luxmeter['id'],
            'lux'=> $lux,
        ]);
        if($lux<$greenhouse->datasayur['luxopt'] && $greenhouse->lampu->status=="0"){
           $lampu=lampu::where('id', $greenhouse->lampu->id)
           ->update([
               'status'=>'1'
           ]);
           loglampu::create([ 
            'lampu_id'=>$greenhouse->lampu->id,  
        ]);

        }             
        else if($lux>$greenhouse->datasayur['luxopt'] && $greenhouse->lampu->status=="1"){
            $lampu=lampu::where('id', $greenhouse->lampu->id)
        ->update([
            'status'=>'0'
        ]);
        $log=$greenhouse->lampu->getloglampu;
        $now = Carbon::now();
        $start= Carbon::parse($log['created_at']);
        $penggunaan=$start->diffInSeconds($now);
            loglampu::where('id',$log['id'])->update([ 
            'penggunaan'=>$penggunaan,
        ]);
    
    };
    }

        if($request->hum != $greenhouse->termometer->kelembaban['kelembaban']){
            kelembaban::create([ 
                'termometer_id'=> $greenhouse->termometer->id,
                'kelembaban'=> $request->hum,
            ]);
        }

        if($request->suhu != $greenhouse->termometer->getsuhu['suhu']){
            suhu::create([ 
                'termometer_id'=> $greenhouse->termometer->id,
                'suhu'=> $request->suhu,
            ]);
            if(($request->suhu)>($greenhouse->datasayur['suhuopt'])&&($greenhouse->kipas['status']=='0')){
            $kipas=kipas::where('id', $greenhouse->kipas->id)
               ->update([
                   'status'=>'1'
               ]);
               logkipas::create([ 
                'kipas_id'=>$greenhouse->kipas->id,
            ]);
           }
            else if(($request->suhu)<($suhuopt=$greenhouse->datasayur['suhuopt'])&&($greenhouse->kipas['status']=='1')){
            $kipas=kipas::where('id', $greenhouse->kipas->id)
            ->update([
                'status'=>'0'
            ]);
            $log=$greenhouse->kipas->getlogkipas;
            $now = Carbon::now();
            $start= Carbon::parse($log['created_at']);
            $penggunaan=$start->diffInSeconds($now);
            logkipas::where('id',$log->id)->update([ 
                'penggunaan'=>$penggunaan,
            ]);
            
           
        }
        }


    $ardlampu=lampu::where('id',$greenhouse->lampu['id'])->latest("created_at")->first();
    $ardkipas=kipas::where('id',$greenhouse->kipas['id'])->latest("created_at")->first();
    $ardpompa=pompa::where('id',$greenhouse->tandon->pompa['id'])->latest("created_at")->first();
    return response()->json([
        "status"=>$greenhouse->status,
        "lampu"=>$ardlampu->status,
        "kipas"=> $ardkipas->status,
        "pompa"=>$ardpompa->status,
        "volume"=>$tinggiairreal

    ]);

}

else{
    $ardlampu=$greenhouse->lampu['status'];
    $ardkipas=$greenhouse->kipas['status'];
    $ardpompa=$greenhouse->tandon->pompa['status'];
    return response()->json([
        "status"=>$greenhouse->status,
        "lampu"=>$ardlampu,
        "kipas"=> $ardkipas,
        "pompa"=>$ardpompa,
        

    ]);
}
    }





}
