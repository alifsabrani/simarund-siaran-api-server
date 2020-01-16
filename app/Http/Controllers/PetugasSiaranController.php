<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siaran;
use App\PetugasSiaran;

class PetugasSiaranController extends Controller
{
   public function show(Siaran $siaran){
      return $siaran->petugas_siaran()->get();
   }
   public function store(Siaran $siaran, Request $req){
      $data = $req->all();
      foreach($data as $row){
         $kondisi = PetugasSiaran::where(['id_siaran' => $siaran['id'], 'bagian' => $row['bagian']])->first();
         if(!$kondisi){
            if($row['id_pegawai'] != "0"){
               $siaran->petugas_siaran()->create($row);
            }
         }
         else{
            PetugasSiaran::where(['id_siaran' => $siaran['id'], 'bagian' => $row['bagian']])->update(['id_pegawai' => $row['id_pegawai']]);
         }
      }
      return $this->show($siaran);
   }
      
}