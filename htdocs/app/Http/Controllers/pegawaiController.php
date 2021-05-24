<?php

namespace App\Http\Controllers;
use App\penanggungjawab;
use App\User;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class pegawaiController extends Controller
{
             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=penanggungjawab::all();
        return view('pegawai.index',compact('pegawai'));
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
            'nama'=>'required',
            'alamat'=>'required',
            'hp'=>'required',
            'image'=>'required'
        ]);
        if($validator->fails()){
            return back()->with('warning','Fild Kosong');
        }
        $pass=bcrypt('pegawai');
        $user=user::create([
            'username'=>$request->username,
            'role'=>'pegawai',
            'password'=>$pass,
        ]);
        //image
        $tujuan='dist/img/pekerja';
        $gambar=$request->file('image');
        $namagambar=$gambar->getClientOriginalName();
        $gambar->move($tujuan,$namagambar);
        penanggungjawab::create([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->hp,
            'gambar'=>$namagambar,
            'user_id'=>$user->id,
        ]);
        return back()->with('success','Data Pegawai Dibuat');
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
    public function destroy(penanggungjawab $pegawai)
    {
        
        penanggungjawab::destroy($pegawai->id);
        user::destroy($pegawai->user_id);
        $tujuan='dist/img/pekerja'.'/'.$pegawai->gambar;
        unlink($tujuan);
        return back()->with('success','Data Dihapus!');
    }
}
