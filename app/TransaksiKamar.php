<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiKamar extends Model
{
     protected $table = 'transaksi_kamars';

    protected $fillable = ['user_id','invoice_id','tamu_id','kamar_id','jumlah_dewasa','jumlah_anak','tgl_checkin','tgl_checkout','total_biaya','deposit','status'];

    protected $appends = ['deposit_format','total_biaya_format'];

    public function kamar(){
    	return $this->hasOne('App\Kamar','id','kamar_id');
    }

    public function tamu(){
    	return $this->hasOne('App\Tamu','id','tamu_id');
    }

    public function getDepositFormatAttribute($value){
    	return 'Rp. '.number_format($this->attributes['deposit'],2);
    }

    public function getTotalBiayaFormatAttribute($value){
        return 'Rp. '.number_format($this->attributes['total_biaya'],2);
    }
}
