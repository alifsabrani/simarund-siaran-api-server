<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSiaran extends Model
{
    protected $table = 'item_siaran';
    public $timestamps = false;
    public $fillable = ['id_siaran', 'id_item', 'urutan'];

    public function siaran(){
        return $this->belongsTo('App\Siaran', 'id_siaran', 'id');
    }
}
