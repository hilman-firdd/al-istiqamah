<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Layanan;
use App\LayananKategori;
use DB;
use Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect; 
class LayananController extends Controller
{
   function __construct()
    {
        $this->title = 'layanan';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $layanan = Layanan::all();
         $layanan_kategori = layananKategori::pluck('nama_layanan_kategori','id');
        // dd($data);
        return view('Admin.'.$title.'.index',compact('title','layanan','layanan_kategori'));
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
        $this->validate($request, [
            'nama_layanan' => 'required',
            'layanan_kategori_id' => 'numeric|min:1',
            'satuan' => 'required',
            'harga' => 'numeric|min:1'
        ]);
         $model = $request->all();

     
          if (Layanan::create($model)){
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
        $model = $request->all();
        $data = Layanan::find($model['id']); 

        if ($data->update($model)){                
            Alert::success('Data Berhasil Diupdate', 'Selamat');
        }else{
            Alert::error('Data Gagal Diupdate', 'Maaf');
        }
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
         $data = Layanan::find($id);
        if($data->delete()){
            Alert::success('Data Berhasil Dihapus', 'Selamat');
        }else{
            Alert::error('Data Gagal Dihapus', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }
}
