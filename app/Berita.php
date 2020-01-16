<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $fillable = ['id', 'durasi', 'lokasi', 'jenis_liputan', 'id_kameramen', 'id_reporter', 'tanggal', 'id_kategori'];
    public $timestamps = false;
    public $incrementing = false;

    public function item(){
        return $this->belongsTo('App\Item', 'id', 'id')->withDefault();
    }

    public function kameramen(){
        return $this->belongsTo('App\Pegawai', 'id_dubber', 'id');
    }

    public function reporter(){
        return $this->belongsTo('App\Pegawai', 'id_penterjemah', 'id');
    }
}
