<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use DateTime;
use App\Kamar;
use App\Perusahaan;
use App\Tamu;
use App\TransaksiKamar;
use App\TransaksiLayanan;
use Auth;
use Alert;

class CheckOutController extends Controller
{
    function __construct()
    {
        $this->title = "checkout";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $kamar = Kamar::where('status',1)->with('transaksi','typekamar')->whereHas('transaksi')->get();

        return view('Admin.'.$title.'.index', compact('title','kamar'));
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
        $title = $this->title;
        $transaksi = TransaksiKamar::find($id);
        $fdate = $transaksi->tgl_checkin;
        $tdate = $transaksi->tgl_checkout;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $jumlah_hari = $interval->format('%a');

        $tgl_checkout = date('d-m-Y H:i:s');
        // $jumlah_hari = $this->jumlahhari($transaksi->tgl_checkin,$tgl_checkout);
        $total = $transaksi->kamar->typekamar->harga_malam * $jumlah_hari;
        $layanan = TransaksiLayanan::where('transaksi_kamar_id',$transaksi->id)->get();

        return view('Admin.'.$title.'.edit',compact('title','transaksi','jumlah_hari','layanan','tgl_checkout','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $transaksi = TransaksiKamar::find($id);
        $tgl_checkout = $transaksi->tgl_checkout;
        $tgl_checkin = $transaksi->tgl_checkin;
        $datetime1 = new DateTime($tgl_checkout);
        $datetime2 = new DateTime($tgl_checkin);
        $interval = $datetime1->diff($datetime2);
        $selisih = $interval->format('%a');
        // $selisih = $this->jumlahhari($tgl_checkin,$tgl_checkout);
        $input['status'] = 0;
        $input['tgl_checkout'] = date('Y-m-d H:i:s');
        $total = $transaksi->kamar->typekamar->harga_malam * $selisih;
        // $ppn = round($sub_total * (1/10));
        
        $input ['total_biaya']  = $total - $transaksi->deposit;

        if ($transaksi->update($input))
        {
            $kamar = $transaksi->kamar->update(['status' => 2]);
        }
        Alert::success('Data Berhasil Diupdate', 'Selamat');
        return Redirect::to('admin/'.$this->title);
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

    public function cetak_invoice($id)
    {

        $title = $this->title;
        $transaksi = TransaksiKamar::with('kamar','tamu')->find($id);
        $tgl_checkout = date('Y-m-d H:i:s');

        $tgl_checkout = $transaksi->tgl_checkout;
        $tgl_checkin = $transaksi->tgl_checkin;
        $datetime1 = new DateTime($tgl_checkout);
        $datetime2 = new DateTime($tgl_checkin);
        $interval = $datetime1->diff($datetime2);
        $jumlah_hari = $interval->format('%a');

        // $jumlah_hari = $this->jumlahhari($transaksi->tgl_checkin,$tgl_checkout);
        $layanan = TransaksiLayanan::where('transaksi_kamar_id',$transaksi->id)->get();
        $perusahaan = Perusahaan::all();
        return view('Admin.'.$title.'.invoice',compact('title','transaksi','jumlah_hari','layanan','perusahaan'));
    }

    // public function checkoutprint($id)
    // {
    //     $this->data['transaksi'] = TransaksiKamar::with('kamar','tamu')->find($id);
    //     $this->data['tgl_checkout'] = date('Y-m-d H:i:s');
    //     $this->data['jumlah_hari'] = $this->jumlahhari($this->data['transaksi']->tgl_checkin,$this->data['tgl_checkout']);
    //     $this->data['layanan'] = TransaksiLayanan::where('transaksi_kamar_id',$this->data['transaksi']->kamar->id)->get();
    //     return view('backend.checkout.invoice',$this->data);
    // }

}
