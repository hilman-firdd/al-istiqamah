<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
      protected $table = 'kamars';
    protected $fillable = ['nomor_kamar','type_id','lantai_id','max_dewasa','max_anak','status'];

    public function typekamar()
    {
    	return $this->hasOne('App\KamarType','id','type_id');
    }

     public function lantais()
    {
    	return $this->hasOne('App\Lantai','id','lantai_id');
    }

    public function transaksi(){
    	return $this->belongsTo('App\TransaksiKamar','id','kamar_id');
    }

    public function type()
    {
        return $this->belongsTo('App\KamarType','type_id');
    }
}
