<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    public $fillable = ['hari', 'id_kategori'];
    public $timestamps = false;
    public $incrementing = false;

    public function kategori(){
        return $this->belongsTo('App\kategori', 'id_kategori', 'id');
    }
}
