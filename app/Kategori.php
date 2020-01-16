<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public $timestamps = false;
    public $fillable = ['nama', 'siaran_lokal'];

    public function berita_daerah(){
        return $this->hasMany('App\BeritaDaerah', 'id_kategori', 'id');
    }

    public function berita(){
        return $this->hasMany('App\Berita', 'id_kategori', 'id');
    }

    public function jadwal(){
        return $this->hasOne('App\Jadwal', 'id_kategori', 'id');
    }
}
