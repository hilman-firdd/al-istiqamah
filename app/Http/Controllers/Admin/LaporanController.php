<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDF;
use App\TransaksiKamar;
use App\TransaksiLayanan;
use App\Perusahaan;
class LaporanController extends Controller
{
    function __construct()
    {
        $this->title = "laporan";
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title; 
        return view('Admin.'.$title.'.index', compact('title'));
    }


    public function kamar(Request $request)
    {
       
        $title = $this->title;

        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        // $data = DB::select("select * from transaksi_kamars WHERE date(created_at) BETWEEN '$tgl_awal' and '$tgl_akhir'");
        $data = TransaksiKamar::whereBetween('created_at',[$tgl_awal,$tgl_akhir])->where('status',0)->get();
        $total = 'Rp. '.number_format($data->sum('total_biaya'),2);
         $perusahaan = Perusahaan::all();

         $pdf = PDF::loadView('Admin/laporan/kamar', compact('data','total','perusahaan'))->setPaper('f4','potrait');
       return $pdf->stream();
    }


        public function layanan(Request $request)
    {
       
        $title = $this->title;

        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        // $data = DB::select("select * from transaksi_kamars WHERE date(created_at) BETWEEN '$tgl_awal' and '$tgl_akhir'");
        $data = TransaksiLayanan::whereHas('transaksikamar')->whereBetween('created_at',[$tgl_awal,$tgl_akhir])->with(['transaksikamar' => function($q) {
                    $q->with('kamar');
            }])->with('layanan','user')->get();
        $total = 'Rp. '.number_format($data->sum('total'),2);
         $perusahaan = Perusahaan::all();

         $pdf = PDF::loadView('Admin/laporan/layanan', compact('data','total','perusahaan'))->setPaper('f4','potrait');
       return $pdf->stream();
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
        //
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
