<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaDaerah extends Model
{
    protected $table = 'berita_daerah';
    protected $fillable = ['id', 'durasi', 'id_dubber', 'id_penterjemah', 'tanggal', 'id_kategori'];
    public $timestamps = false;
    public $incrementing = false;

    public function item(){
        return $this->belongsTo('App\Item', 'id', 'id')->withDefault();
    }

    public function dubber(){
        return $this->belongsTo('App\Pegawai', 'id_dubber', 'id');
    }

    public function penterjemah(){
        return $this->belongsTo('App\Pegawai', 'id_penterjemah', 'id');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id');
    }
}
