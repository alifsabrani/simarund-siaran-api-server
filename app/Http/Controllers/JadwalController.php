<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Kategori;

class JadwalController extends Controller
{
    public function index(){
        return Jadwal::join('kategori', 'kategori.id', '=', 'jadwal.id_kategori')
        ->where('kategori.id', '!=', '1')
        ->select('kategori.nama as nama', 'jadwal.hari as hari')
        ->orderBy('hari', 'asc')
        ->get();
    }

    public function lokal(){
        return Jadwal::join('kategori', 'kategori.id', '=', 'jadwal.id_kategori')
        ->where('kategori.siaran_lokal', '=', '1')
        ->select('kategori.nama as nama', 'jadwal.hari as hari')
        ->get();
    }

    public function nonLokal(){
        return Jadwal::join('kategori', 'kategori.id', '=', 'jadwal.id_kategori')
        ->where('kategori.siaran_lokal', '=', '0')
        ->select('kategori.nama as nama', 'jadwal.hari as hari')
        ->get();
    }

    public function update(Request $req){
        $data = json_decode($req->getContent(), true);
        foreach($data as $row){
            $kategori = Kategori::where('nama', $row['nama'])->select('id')->first();
            Jadwal::where('hari', $row['hari'])->whereNotIn('id_kategori', [1])->update(['id_kategori' => $kategori->id]);
        }
        return response()->json($this->index(), 200);
    }
}
