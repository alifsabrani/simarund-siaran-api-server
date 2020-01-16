<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siaran extends Model
{
    protected $table = 'siaran';
    protected $fillable = ['tanggal', 'id_kategori'];
    public $timestamps = false;

    public function petugas_siaran(){
        return $this->hasMany('App\PetugasSiaran', 'id_siaran', 'id');
    }

    public function item_siaran(){
        return $this->hasMany('App\ItemSiaran', 'id_siaran', 'id');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id');
    }

}
