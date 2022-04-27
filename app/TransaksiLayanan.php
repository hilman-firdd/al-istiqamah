<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiLayanan extends Model
{
   protected $table = 'transaksi_layanans';

    protected $fillable = ['user_id','transaksi_kamar_id','layanan_id','jumlah','total','harga'];

    protected $appends = ['total_format'];

    public function transaksikamar(){
    	return $this->hasOne('App\TransaksiKamar','id','transaksi_kamar_id');
    }

    // public function layanan(){
    // 	return $this->hasOne('App\Layanan','id','layanan_id');
    // }

     public function layanan(){
            return $this->belongsTo('App\Layanan');
    }

    public function getTotalFormatAttribute($value){
    	return 'Rp. '.number_format($this->attributes['total'],2);
    }

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
