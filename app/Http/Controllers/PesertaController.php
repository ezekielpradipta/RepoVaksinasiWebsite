<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaksin;
use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        $stocks = DB::table('vaksins')
        ->where('vaksin_stock','>','0')
        ->where('vaksin_status','=','1')
        ->get();
        return view('depan2', compact('stocks'));
    }
    public function cekstatus(){
        return view('cekstatus');
    }
    public function isiHalaman(){
        $stock = DB::table('vaksins')
        ->where('vaksin_stock','>','0')
        ->where('vaksin_status','=','1')
        ->get();
        return response()->json(['stock'=>$stock]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nik'=>['required'],
            'nama'=>['required'],
            'tempatlahir'=>['required'],
            'tgllahir'=>['required'],
            'alamat'=>['required'],
            'pekerjaan'=>['required'],
            'nohp'=>['required'],
        ]);
        $random = Str::random(6);
         $pasien = Pasien::create([
            'nomordaftar'=>$random,
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'tempatlahir'=>$request->tempatlahir,
            'tgllahir'=>$request->tgllahir,
            'alamat'=>"$request->alamat",
            'pekerjaan'=>$request->pekerjaan,
            'nohp'=>$request->nohp,
            'vaksin_id'=>$request->vaksin_id,
            'validasi'=>'0',
          ]);
          $stok_id = $request->vaksin_id;
          $jumlahstok= Vaksin::find($stok_id)->decrement('vaksin_stock',1);;

      return response()->json();
    }
    public function aftertambah($nik){
        $peserta = DB::table('pasiens')
        ->join('vaksins','vaksins.id','=','pasiens.vaksin_id')
        ->where('nik','=',$nik)->first();
        return response()->json(['peserta'=>$peserta]);
    }
}
