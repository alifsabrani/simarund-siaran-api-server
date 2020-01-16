<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Item;
use App\Pegawai;
use App\Kategori;

class BeritaController extends Controller
{
    public function index(){
        return Berita::join('item', 'item.id', '=', 'berita.id')
        ->join('pegawai as kameramen', 'kameramen.id', '=', 'berita.id_kameramen')
        ->join('pegawai as reporter', 'reporter.id', '=', 'berita.id_reporter')
        ->join('kategori', 'berita.id_kategori', '=', 'kategori.id')
        ->select('item.id_pengguna as id_pengguna', 'item.id as id', 'item.judul as judul', 'berita.durasi as durasi', 'kameramen.id as id_kameramen', 'kameramen.alias as kameramen', 'reporter.id as id_reporter','reporter.alias as reporter', 'berita.tanggal', 'berita.lokasi', 'berita.jenis_liputan', 'kategori.nama as siaran')
        ->get();
    }

    public function show(Berita $berita)
    {
        return $berita->join('item', 'item.id', '=', 'berita.id')
        ->join('pegawai as kameramen', 'kameramen.id', '=', 'berita.id_kameramen')
        ->join('pegawai as reporter', 'reporter.id', '=', 'berita.id_reporter')
        ->join('kategori', 'berita.id_kategori', '=', 'kategori.id')
        ->where('item.id', $berita['id'])
        ->select('item.id_pengguna as id_pengguna', 'item.id as id', 'item.judul as judul', 'berita.durasi as durasi', 'kameramen.id as id_kameramen', 'kameramen.alias as kameramen', 'reporter.id as id_reporter','reporter.alias as reporter', 'berita.tanggal', 'berita.lokasi', 'berita.jenis_liputan', 'kategori.nama as siaran')
        ->first();
    }

    public function store(Request $request)
    {
        $id = Item::create($request->all())->id;
        $berita = $request->all();
        $berita['id'] = $id;
        $id_kameramen = Pegawai::where('alias', $berita['kameramen'])->first()->id;
        $id_reporter = Pegawai::where('alias', $berita['reporter'])->first()->id;
        $id_kategori = Kategori::where('nama', $berita['siaran'])->first()->id;
        $berita['id_kameramen'] = $id_kameramen;
        $berita['id_reporter'] = $id_reporter;
        $berita['id_kategori'] = $id_kategori;
        $res = Berita::create($berita);
        
        return response()->json($this->show($res), 201);
    }
 
    public function update(Request $request, $id)
    {
        $ids = explode(",", $id);
        $data = json_decode($request->getContent(), true);
        foreach($data as $row){
            $id_kameramen = Pegawai::where('alias', $row['kameramen'])->first()->id;
            $id_reporter = Pegawai::where('alias', $row['reporter'])->first()->id;
            $id_kategori = Kategori::where('nama', $row['siaran'])->first()->id;
            Item::where('id', $row['id'])->update(['judul' => $row['judul']]);
            Berita::where('id', $row['id'])->update(['durasi' => $row['durasi'],'lokasi' => $row['lokasi'], 'jenis_liputan' => $row['jenis_liputan'], 'id_kameramen' => $id_kameramen, 'id_reporter' => $id_reporter, 'tanggal' => $row['tanggal'], 'id_kategori' => $id_kategori]);
        }
        return response()->json($this->index(), 200);
    }
 
    public function delete($id)
    {
        $ids = explode(",", $id);
        $items = Item::destroy($ids);
        return response()->json($items, 204);
    }
}
