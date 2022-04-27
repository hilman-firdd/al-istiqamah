<?php

namespace App\Http\Controllers;

use App\Order;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Firmantr3\Midtrans\Facade\Midtrans;

class WebController extends Controller
{
    public function index()
    {
        return view('midtrans.index');
    }

    public function payment(Request $request)
    {
        // Set your Merchant Server key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-O5vbCHWNMiDad39of9s2b-sO';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true; 

        $params = array(    
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    "id"        => "a01",
                    "price"     => 7000,
                    "quantity"  => 1,
                    "name"      => "Apple"
                ],
                [
                    "id"        => "b02",
                    "price"     => 3000,
                    "quantity"  => 2,
                    "name"      => "Orange"
                ]
            ),
            'customer_details' => array( 
                'first_name' => $request->get('name'),   
                'email' => $request->get('email'),        
                'phone' => $request->get('number'),    
            ),);
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        

        return view('midtrans/payment', ['snap_token' => $snapToken]);
    }

    public function send_payment(Request $request) 
    {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->name = $request->get('name');
        $order->email = $request->get('email');
        $order->number = $request->get('number');
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('/'))->with('alert-success', 'Booking berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
