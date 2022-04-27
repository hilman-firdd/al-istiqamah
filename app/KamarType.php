<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KamarType extends Model
{
     protected $table = 'kamar_types';
    protected $fillable = ['nama','harga_malam','harga_orang','keterangan'];
    protected $appends = ['harga_malam_format','harga_orang_format'];

    public function getHargaMalamFormatAttribute($value)
    {
        return 'Rp. '.number_format($this->attributes['harga_malam'],2);
    }

     public function getHargaOrangFormatAttribute($value)
    {
        return 'Rp. '.number_format($this->attributes['harga_orang'],2);
    }
}
