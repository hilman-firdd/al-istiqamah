<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
      protected $table = 'layanans';
    protected $fillable = ['nama_layanan','layanan_kategori_id','satuan','harga'];
    protected $appends = ['harga_format'];

    public function layanankategori(){
    	return $this->hasOne('App\LayananKategori','id','layanan_kategori_id');
    }
  //    public function layanankategori() {
  //   return $this->belongsTo('LayananKategori');
  // }

    public function getHargaFormatAttribute($value){
    	return 'Rp. '.number_format($this->attributes['harga'],2);
    }
}
