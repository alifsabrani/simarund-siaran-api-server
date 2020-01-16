<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pengguna extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'pengguna';
    public $timestamps = false;
    public $fillable = ['username', 'password', 'level'];
    
}
    