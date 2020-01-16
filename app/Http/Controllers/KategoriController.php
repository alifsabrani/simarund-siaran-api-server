<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(){
        return Kategori::all();
    }

    public function show(Kategori $kategori){
        return $kategori;
    }

    public function store(Request $req){
        $res = Kategori::create($req->all());
        return response()->json($res, 201);
    }

    public function update(Request $req, $id){
        $ids = explode(",", $id);
        $data = json_decode($req->getContent(), true);
        foreach($data as $row){
            Kategori::where('id', $row['id'])->update(['nama' => $row['nama'],'siaran_lokal' => $row['siaran_lokal']]);
        }
        return response()->json($this->index(), 200);
    }

    public function delete($id){
        $ids = explode(",", $id);
        $items = Kategori::destroy($ids);
        return response()->json($items, 204);
    }

    public function namaSiaranLokal(){
        return Kategori::where('siaran_lokal', 1)->pluck('nama')->toArray();
    }

    public function namaSiaranNonLokal(){
        return Kategori::where('siaran_lokal', 0)->pluck('nama')->toArray();
    }

    public function namaSiaranNonUtama(){
        return Kategori::whereNotIn('id', [1])->pluck('nama')->toArray();
    }
}
