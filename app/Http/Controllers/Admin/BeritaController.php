<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Alert; 
use App\Berita;
class BeritaController extends Controller
{
    function __construct()
    {
        $this->title = 'berita';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title =  $this->title;

       $berita = Berita::all();
       return view('Admin.'.$title.'.index',compact('title','berita'));
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
       $this->validate($request, [
        'title' => 'required',
        'isi_berita' => 'required',
        'status' =>'required',
    ]);
       

       $model = $request->all();
       $model['user_id'] = \Auth::user()->id;
       
       if (Berita::create($model)){
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
        $model['user_id'] = \Auth::user()->id;
        $data = Berita::find($model['id']); 

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
     $data = Berita::find($id);
     if($data->delete()){
        Alert::success('Data Berhasil Dihapus', 'Selamat');
    }else{
        Alert::error('Data Gagal Dihapus', 'Maaf');
    }
    return Redirect::to('admin/'.$this->title);
}
}
