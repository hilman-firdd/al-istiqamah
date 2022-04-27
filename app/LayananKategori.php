<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananKategori extends Model
{
   protected $table = 'layanan_kategoris';
    protected $fillable = ['nama_layanan_kategori','keterangan'];

    public function layanan(){
      return $this->belongsTo('App\Layanan');
    }
}
