<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
   protected $table = 'levels';
    protected $fillable = [
        'nama','keterangan'
    ];

    public function user(){
    	return $this->belongsTo('App\User','level','id');
    }
}
