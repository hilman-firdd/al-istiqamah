<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function index()
    {
        return env('CLIENT_KEY');
        // Mail::to('bambangkapr23@gmail.com')->send(new SendEmail);
        // return 'ok';
    }
}
