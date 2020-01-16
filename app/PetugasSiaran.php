<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetugasSiaran extends Model
{
    protected $table = 'petugas_siaran';
    public $timestamps = false;
    public $fillable = ['id_pegawai', 'id_siaran', 'bagian'];

    public function siaran(){
        return $this->belongsTo('App\Siaran', 'id_siaran', 'id');
    }

    public function pegawai(){
        return $this->belongsTo('App\Pegawai', 'id_pegawai', 'id');
    }
}
