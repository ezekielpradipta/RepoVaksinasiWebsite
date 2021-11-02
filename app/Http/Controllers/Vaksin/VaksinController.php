<?php

namespace App\Http\Controllers\Vaksin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaksin;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $vaksin = Vaksin::latest()->get();
            return Datatables::of($vaksin)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"><span class="fa fa-pencil"></a>';
                            return $btn;
                    })
                    ->editColumn('vaksin_status',function($vaksin){
                        if($vaksin->vaksin_status=="0"){
                            return '<span class="label label-danger">Tidak Aktif</span>';
                        } else{
                            return '<span class="label label-success">Aktif</span>';
                        }
                    })
                    ->rawColumns(['action','vaksin_status'])
                    ->make(true);
        }
        return view('vaksin.index');
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
        $vaksin =Vaksin::updateOrCreate(['id' => $request->vaksin_id],
                ['vaksin_nama' => $request->vaksin_nama,
                'vaksin_stock' => $request->vaksin_stock,
                'vaksin_status' => $request->vaksin_status,
                'vaksin_dosis' => $request->vaksin_dosis,
                'vaksin_sesi' => $request->vaksin_sesi,
            ]);        

        return response()->json($vaksin);
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
        $vaksin = Vaksin::find($id);
        return response()->json($vaksin);
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
        $vaksin = Vaksin::find($id)->delete();
        return response()->json($vaksin);
    }
}
