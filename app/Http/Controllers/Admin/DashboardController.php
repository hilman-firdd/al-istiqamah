<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kamar;
use App\TransaksiKamar;
use App\Berita;
use DB;
use auth;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kt= Kamar::where('status',0)->count();
        $kp = Kamar::where('status',1)->count();
        $kotor = Kamar::where('status',2)->count();
        $tamu = TransaksiKamar::where('status',1)->get();
        $tamu_checkout = TransaksiKamar::whereDate('tgl_checkout', Carbon::today())
        ->where('status',1)
        ->get();
       
        $berita = Berita::orderBy('created_at','DESC')->paginate(3);  
      // $tamu_checkout = DB::select('SELECT * FROM transaksi_kamars WHERE DATE(tgl_checkout) = CURDATE()');
     // dd($tamu_checkout);

       
         return view('Admin.dashboard',compact('kt','kp','kotor','tamu','tamu_checkout','berita'));
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
