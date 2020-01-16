<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    public $timestamps = false;
    public $fillable = ['nama', 'jabatan', 'alias'];

    public function petugas_siaran(){
        return $this->hasMany('App\PetugasSiaran', 'id_pegawai', 'id');
    }
}
