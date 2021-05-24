<?php

namespace App\Http\Controllers;
use App\tandon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TandonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tandon=tandon::all();
        return view('tandon.index',compact('tandon'));
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
            'volume'=>'required'
        ]);
            if($validator->fails()){
                return back()->with('warning','Fild Kosong');
            }
        $getid=tandon::select('id')->OrderBy('id','desc')->first();
        $get=$getid['id']+1;
        $nota=str_pad($get,3,"0",STR_PAD_LEFT);
        $kode='TDN-'.$nota;
        tandon::create([
            'kode'=>$kode,
            'volume_tandon'=>$request->volume
        ]);
        return back()->with('success','Data Tandon Dibuat');
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
        $validator = Validator::make($request->all(),[
            'volume'=>'required'
        ]);
            if($validator->fails()){
                return back()->with('warning','Fild Kosong');
            }
        tandon::where('id',$id)
        ->update([
            'volume_tandon'=>$request->volume,
        ]);
        return back()->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tandon::destroy($id);
        return back()->with('success','Data Dihapus!');
    }
}
