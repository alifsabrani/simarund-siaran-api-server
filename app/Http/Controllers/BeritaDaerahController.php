<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BeritaDaerah;
use App\Item;
use App\Pegawai;
use App\Kategori;

class BeritaDaerahController extends Controller
{
    public function index(){
        return BeritaDaerah::join('item', 'item.id', '=', 'berita_daerah.id')
        ->join('pegawai as dubber', 'dubber.id', '=', 'berita_daerah.id_dubber')
        ->join('pegawai as penterjemah', 'penterjemah.id', '=', 'berita_daerah.id_penterjemah')
        ->join('kategori', 'berita_daerah.id_kategori', '=', 'kategori.id')
        ->select('item.id_pengguna as id_pengguna', 'item.id as id', 'item.judul as judul', 'berita_daerah.durasi as durasi', 'dubber.id as id_dubber', 'dubber.alias as dubber', 'penterjemah.id as id_penterjemah','penterjemah.alias as penterjemah', 'berita_daerah.tanggal', 'kategori.nama as siaran')
        ->get();
    }

    public function show(BeritaDaerah $berita)
    {
        return $berita->join('item', 'item.id', '=', 'berita_daerah.id')
                        ->join('pegawai as dubber', 'dubber.id', '=', 'berita_daerah.id_dubber')
                        ->join('pegawai as penterjemah', 'penterjemah.id', '=', 'berita_daerah.id_penterjemah')
                        ->join('kategori', 'berita_daerah.id_kategori', '=', 'kategori.id')
                        ->where('item.id', $berita['id'])
                        ->select('item.id_pengguna as id_pengguna','item.id as id', 'item.judul as judul', 'berita_daerah.durasi as durasi', 'dubber.id as id_dubber', 'dubber.alias as dubber', 'penterjemah.id as id_penterjemah','penterjemah.alias as penterjemah', 'berita_daerah.tanggal', 'kategori.nama as siaran')
                        ->first();
    }

    public function store(Request $request)
    {
        $id = Item::create($request->all())->id;
        $berita = $request->all();
        $berita['id'] = $id;
        $id_dubber = Pegawai::where('alias', $berita['dubber'])->first()->id;
        $id_penterjemah = Pegawai::where('alias', $berita['penterjemah'])->first()->id;
        $id_kategori = Kategori::where('nama', $berita['siaran'])->first()->id;
        $berita['id_dubber'] = $id_dubber;
        $berita['id_penterjemah'] = $id_penterjemah;
        $berita['id_kategori'] = $id_kategori;
        $res = BeritaDaerah::create($berita);
        
        return response()->json($this->show($res), 201);
    }
 
    public function update(Request $request, $id)
    {
        $ids = explode(",", $id);
        $data = json_decode($request->getContent(), true);
        foreach($data as $row){
            $id_dubber = Pegawai::where('alias', $row['dubber'])->first()->id;
            $id_penterjemah = Pegawai::where('alias', $row['penterjemah'])->first()->id;
            $id_kategori = Kategori::where('nama', $row['siaran'])->first()->id;
            Item::where('id', $row['id'])->update(['judul' => $row['judul']]);
            BeritaDaerah::where('id', $row['id'])->update(['durasi' => $row['durasi'], 'id_dubber' => $id_dubber, 'id_penterjemah' => $id_penterjemah, 'tanggal' => $row['tanggal'], 'id_kategori' => $id_kategori]);
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
