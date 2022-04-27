<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    // public function index()
    // {
    //     if (auth()->check() && Auth::user()->level == '1' )
    //         {
    //             return Redirect('/admin/home');

    //         }elseif (auth()->check() && Auth::user()->level == '2') 
    //         {
    //            return Redirect('/front');
    //         }
            
    //     else
    //         {
    //             echo "halaman tidak ditemukan";
    //         }
    // }
}
