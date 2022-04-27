<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    protected $table = 'lantais';
    protected $fillable = ['nama','keterangan'];
}
