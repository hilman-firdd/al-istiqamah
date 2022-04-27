<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Alert;
use App\User;
use App\Level;
use Auth;
use Hash;
class UserController extends Controller
{
     public function __construct()
    {
        $this->title = 'user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $title = $this->title; 
        $data=User::with('levels')->get();
        $level = Level::pluck('nama','id');
        // $data = User::where('id', '!=', Auth::id())->get();
        return view('Admin.'.$title.'.index', compact('title','data','level'));
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
         $request->validate([
            'name' => 'required',
            'username' => 'required',
            'level' =>'numeric|min:1',
            'password' => 'required',
            'jabatan' => 'required',
            'active' => 'string',
            'email' => 'required|email'
         ]);
        $model = $request->all();
        $model['password'] = bcrypt($model['password']); 
     if (User::create($model)){
        Alert::success('Data Berhasil Disimpan', 'Selamat');
     }else{
        Alert::error('Data Gagal Disimpan', 'Maaf');
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

        $data = User::find($model['id']); 

    if ($request->password == '') {

          $input = $request->except('password');

        }
        else {
          $input = $request->all();
        }

         if (!$request->password == '') {

          $input['password'] = bcrypt($request->password);

        }

    if ($data->update($input)){                
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
        $data = User::find($id);
    if($data->delete()){
        Alert::success('Data Berhasil Dihapus', 'Selamat');
    }else{
        Alert::error('Data Gagal Dihapus', 'Maaf');
    }
    return Redirect::to('admin/'.$this->title);
    }
}
