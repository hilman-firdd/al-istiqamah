<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamus';
    protected $fillable = ['title','nama','tipe_identitas','nomor_identitas','warga_negara','alamat_jalan','alamat_kabupaten','alamat_provinsi','nomor_telp','email'];

    // protected $appends = ['nama_lengkap'];

    // public function getNamaLengkapAttribute(){
    // 	$nama_belakang = '';
    // 	if(isset($this->attributes['nama_belakang']))
    // 		$nama_belakang = $this->attributes['nama_belakang'];
    // 	return $this->attributes['title'].' '.$this->attributes['nama_depan'].' '.$nama_belakang;
    // }
}
