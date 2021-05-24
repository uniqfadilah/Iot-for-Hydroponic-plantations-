<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\logkipas;
use App\loglampu;
use App\logpompa;
use Carbon\Carbon;

use Illuminate\Http\Request;

class alatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kipas()
    {
        $kipas=logkipas::select(
            DB::raw('sum(penggunaan) as penggunaan'),
            DB::raw('sum(id) as id'),
            DB::raw('DATE_FORMAT(created_at,"%M %Y") as bulan')
        )->groupBy('bulan')->orderBy('id','desc')->get();

        return view ('alat.kipas',compact('kipas'));
    }

    public function lampu()
    {
        $lampu=loglampu::select(
            DB::raw('sum(penggunaan) as penggunaan'),
            DB::raw('sum(id) as id'),
            DB::raw('DATE_FORMAT(created_at,"%M %Y") as bulan')
        )
        ->groupBy('bulan')->orderBy('id','desc')->get();

        return view('alat.lampu',compact('lampu'));
    }
    public function nutrisi()
    {
       
        $nutrisi=logpompa::select(
            DB::raw('sum(total_nutrisi) as penggunaan'),
            DB::raw('sum(id) as id'),
            DB::raw('DATE_FORMAT(created_at,"%M %Y") as bulan')
        )
        ->groupBy('bulan')->orderBy('id','desc')->get();
        return view('alat.nutrisi',compact('nutrisi'));
    }
}
