<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\Kamar;
use App\Tamu;
use App\KamarType;
use App\TransaksiKamar;
use App\TransaksiLayanan;
use Auth;
use Alert;
use Carbon\Carbon;
use DateTime;
class CheckInController extends Controller
{
    function __construct()
    {
        $this->title = 'checkin';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = Kamar::with('typekamar','lantais')->where('status',0)->orderBy('nomor_kamar')->get();
        return view('Admin.'.$title.'.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = $this->title;
       
        $kamar = Kamar::find($id);
        $no_invoice = 'INV-'.date('Ymd').'-'.(TransaksiKamar::count('id') + 1);
        $tamu = Tamu::all();
      
        return view('Admin.'.$title.'.create',compact('title','kamar','no_invoice','tamu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hapus = trim($request->deposit, "Rp. ");
        $hasilHapus = str_replace(".", "", $hapus);
          $this->validate($request,[
            'tamu_id' => 'integer|min:1',
            'jumlah_dewasa' => 'integer|min:1',
            'jumlah_anak' => 'integer|min:0',
            'invoice_id' => 'required',
            'tgl_checkout' => 'required|date',
            'deposit' => 'required|min:0'
        ]);

        $input = [
            'invoice_id' => $request->invoice_id,
            'tamu_id' => $request->tamu_id,
            'jumlah_dewasa' => $request->jumlah_dewasa,
            'jumlah_anak' => $request->jumlah_anak,
            'tgl_checkin' => $request->tgl_checkin,
            'waktu_checkin' => $request->waktu_checkin,
            'tgl_checkout' => $request->tgl_checkout,
            'waktu_checkout' => $request->waktu_checkout,
            'deposit' => $hasilHapus,
            'kamar_id' => $request->kamar_id
        ];
        
       $input['user_id'] = Auth::user()->id;
       $input['tgl_checkout'] = $request->get('tgl_checkout').' '.$request->get('waktu_checkout');
       $input['tgl_checkin'] = $request->get('tgl_checkin').' '.$request->get('waktu_checkin');
       $input['status'] = 1;
       $kamar = Kamar::find($input['kamar_id']);

        $fdate = $input['tgl_checkin'];
        $tdate =  $input['tgl_checkout'];
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $jumlah_hari = $interval->format('%a');
        
       $input['total_biaya'] = $kamar->typekamar->harga_malam * $jumlah_hari;
       $update_kamar = $kamar->update(['status' => 1]);
       if($update_kamar)
            {
               TransaksiKamar::create($input);
            }
      Alert::success('Data Berhasil Disimpan', 'Selamat');
        return Redirect::to('admin/'.$this->title);
       // return response()->json($update_kamar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
     
    }


      private function jumlahhari($checkin,$checkout)
    {
        $checkin = date_create($checkin);
        $checkout = date_create($checkout);
        $interval = date_diff($checkin, $checkout);
       
       return $interval->format('%a');
       
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
       
        $transaksi = TransaksiKamar::with('kamar','tamu')->find($id);
        
        $tamu = Tamu::all();
      
        return view('Admin.'.$title.'.edit',compact('tamu','transaksi'));
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
        $hapus = trim($request->deposit, "Rp. ");
        $hasilHapus = str_replace(".", "", $hapus);
          $this->validate($request,[
            'tamu_id' => 'integer|min:1',
            'jumlah_dewasa' => 'integer|min:1',
            'jumlah_anak' => 'integer|min:0',
            'invoice_id' => 'required',
            'tgl_checkout' => 'required|date',
            'deposit' => 'required|min:0'
        ]);

        $input = [
            'invoice_id' => $request->invoice_id,
            'tamu_id' => $request->tamu_id,
            'jumlah_dewasa' => $request->jumlah_dewasa,
            'jumlah_anak' => $request->jumlah_anak,
            'tgl_checkin' => $request->tgl_checkin,
            'waktu_checkin' => $request->waktu_checkin,
            'tgl_checkout' => $request->tgl_checkout,
            'waktu_checkout' => $request->waktu_checkout,
            'deposit' => $hasilHapus,
            'kamar_id' => $request->kamar_id
        ];
        $transaksi = TransaksiKamar::find($request->id);
        $input['user_id'] = Auth::user()->id;
        $input['tgl_checkout'] = $request->get('tgl_checkout').' '.$request->get('waktu_checkout');
        $input['tgl_checkin'] = $request->get('tgl_checkin').' '.$request->get('waktu_checkin');
        $input['status'] = 1;

        $fdate = $input['tgl_checkin'];
        $tdate =  $input['tgl_checkout'];
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $jumlah_hari = $interval->format('%a');

        $input['total_biaya'] = $transaksi->kamar->typekamar->harga_malam * $jumlah_hari;

        
        if ($transaksi->update($input))
            {
                $update_kamar = $transaksi->kamar->update(['status' => 1]);
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


  public function listcheckin()
    {
        $title = $this->title;
        $data = TransaksiKamar::with('kamar','tamu')->where('status',1)->get();
        return view('Admin.'.$title.'.list',compact('title','data'));
    }
}
