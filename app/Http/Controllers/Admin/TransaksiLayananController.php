<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
use App\TransaksiLayanan;
use App\TransaksiKamar;
use App\Layanan;
use App\LayananKategori;
use App\Kamar;
use DB;
use Alert;
use Auth;

class TransaksiLayananController extends Controller
{
    function __construct()
    {
        $this->title = "transaksi-layanan";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $guest = TransaksiKamar::with('kamar','tamu')->where('status',1)->get();
        return view('Admin.'.$title.'.index',compact('title','guest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $kamar = Kamar::with('typekamar','lantais')->where('status',2)->get();
        return view('Admin.'.$title.'.create',compact('title','kamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = TransaksiLayanan::make($request->all());
        $service->user_id = Auth::user()->id;
        $service->layanan_id = $service->layanan->id;
        $service->harga = $service->layanan->harga;
        $service->jumlah = $request->jumlah;

        $service->total =  $service->harga * $service->jumlah;

        if ($service->save()){
            Alert::success('Successfully Updated', 'Success');
        }else{
            Alert::error('Something went wrong!', 'Oops...');
        }

        return Redirect::to('admin/'.$this->title);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = $this->title;
       
        $guest = TransaksiKamar::with('kamar','tamu')->find($id);
        $layanan = LayananKategori::all();
        $layanans = Layanan::all();
        $transaksi = TransaksiLayanan::with(['layanan'])->get();
        // $layanans = DB::select('SELECT * FROM layanans WHERE layanan_kategori_id');
      // dd($layanans);
        return view('Admin.'.$title.'.edit',compact('title','guest','layanan','layanans','transaksi'));
    }

     public function getLayanan($id)
    {
        $title = $this->title ;
        
        $layanan = Layanan::where('layanan_kategori_id',$id)->get();

         return response()->json($layanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $title = $this->title ;
        
        // $layanan = Layanan::where('layanan_kategori_id',$id)->get();
         dd($layanan);
        return view('Admin.'.$title.'.test',compact('title','layanan'));
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
        $bersihkan = Kamar::find($id);
        $input['status'] = 0;

        if($bersihkan->update($input)){
          Alert::success('Data Berhasil Disimpan', 'Selamat');
        }
      else{
            Alert::error('Data Gagal Disimpan', 'Maaf');

      }
    
        return Redirect::to('admin/transaksi-layanan/create');
       
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
