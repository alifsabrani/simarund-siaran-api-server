<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $table = 'item';
    public $timestamps = false;
    public $fillable = ['judul', 'id_pengguna'];

    public function berita_daerah(){
        return $this->hasOne('App\BeritaDaerah', 'id', 'id');
    }
}
