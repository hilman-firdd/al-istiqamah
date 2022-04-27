<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = ['user_id','title','isi_berita','status'];

    protected $appends = ['status_text'];

     public function getStatusTextAttribute()
    {
    	if($this->attributes['status'] == 0){
    		return 'BIASA';
    	} 
    	return 'PENTING';
    }

    public function user()
    {
    	return $this->hasOne('App\User','id','user_id');
    }
}
