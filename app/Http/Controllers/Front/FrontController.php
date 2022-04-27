<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use auth;
use Illuminate\Http\Request;
use App\KamarType;
use App\Kamar;
use App\Lantai;
use Carbon\Carbon;
use App\TransaksiKamar;

class FrontController extends Controller
{
    public function index() {
        // if (auth()->check() && Auth::user()->level == '1' )
        //     {
                
        //         return Redirect('/admin/dashboard');
            
        //     }elseif (auth()->check() && Auth::user()->level == '2') 
        //     {
        //         return Redirect('/admin/dashboard');
        //     } 
        // else
        //     {
        //         return view('front.index');
        //         // echo "halaman tidak ditemukan";
        //     }
        return view('front.index');
    }
    
    public function about() {
        return view('front.about');
    }

    public function service() {
        return view('front.service');
    }

    public function room() {
        return view('front.room');
    }
    
    public function ruangmakan() {
        return view('front.ruangMakan');
    }

    public function contact() {
        return view('front.contact');
    }

    public function book()
    {
        $kamar = null;
        if(request('checkInDate')) {
            $sekarang = Carbon::now();
            $checkInDate = Carbon::createFromFormat('m/d/Y', request('checkInDate'));
            $checkOutDate = Carbon::createFromFormat('m/d/Y', request('checkOutDate'));

            if($sekarang->format('Y/m/d') > $checkInDate->format('Y/m/d') || $checkInDate->format('Y/m/d') >= $checkOutDate->format('Y/m/d')) {
                return redirect()->route('front.book')->with('error','Salah mengisi tanggal');
            }

            $kamar = Kamar::where('type_id', request('kamar'))
                        ->where('lantai_id', request('lantai'))
                        ->where('max_dewasa', '>=', request('dewasa'))
                        ->where('max_anak', '>=', request('anak'))
                        ->where('status', 0)
                        ->orderBy('nomor_kamar')->get();
            // dd($kamar);
        }
        return view('front.book', [
            'kamarType' => KamarType::all(),
            'lantai' => Lantai::all(),
            'kamar' => $kamar
        ]);
    }

    public function bookId($id)
    {
        $kamar = Kamar::where('id', $id)
                    ->where('type_id', request('kamar'))
                    ->where('lantai_id', request('lantai'))
                    ->where('status', 0)
                    ->first();
        if($kamar) {
            if($kamar->max_dewasa < request('dewasa') || $kamar->max_anak < request('anak')) {
                return redirect()->route('front.book')->with('error','Max Dewasa / Anak Berlebihan');
            }
        } else {
            return redirect()->route('front.book')->with('error','Silahkan Pilih Kamar');
        }

        $checkInDate = Carbon::createFromFormat('m/d/Y', request('checkInDate'));
        $checkOutDate = Carbon::createFromFormat('m/d/Y', request('checkOutDate'));
        $interval = $checkInDate->diff($checkOutDate);

        return view('front.bookId', [
            'kamarType' => KamarType::all(),
            'lantai' => Lantai::all(),
            'kamar' => $kamar,
            'malam' => $interval->format('%a'),
            'no_invoice' => 'INV-'.date('Ymd').'-'.(TransaksiKamar::count('id') + 1)
        ]);
    }

}
