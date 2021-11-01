<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksin;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $pasien = Pasien::with('vaksin')->latest()->get();
            return Datatables::of($pasien)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"><span class="fa fa-pencil"></a>';
                            return $btn;
                    })
                    ->editColumn('validasi',function($pasien){
                        if($pasien->validasi=="0"){
                            return '<span class="label label-danger">BELUM VAKSIN</span>';
                        } else{
                            return '<span class="label label-success">SUDAH VAKSIN</span>';
                        }
                    })
                    ->rawColumns(['action','validasi'])
                    ->make(true);
        }
        return view('pasien.index');
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
        $pasien = Pasien::updateOrCreate(['id' => $request->pasien_id],
                ['nomordaftar' => $request->pasien_nomordaftar,
                'nik' => $request->pasien_nik,
                'nama' => $request->pasien_nama,
                'tempatlahir' => $request->pasien_tempatlahir,
                'tgllahir' => $request->pasien_tgllahir,
                'alamat' => $request->pasien_alamat,
                'pekerjaan' => $request->pasien_pekerjaan,
                'nohp' => $request->pasien_nohp,
                'vaksin_id' => $request->pasien_vaksin_id,
                'validasi' => $request->pasien_validasi,
            ]);        

        return response()->json($pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return response()->json($pasien);
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
        $pasien = Pasien::find($id)->delete();
        return response()->json($pasien);
    }



    
}
