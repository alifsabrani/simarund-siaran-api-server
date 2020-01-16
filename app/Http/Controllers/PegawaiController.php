<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index(){
        return Pegawai::all();
    }

    public function show(Pegawai $pegawai){
        return $pegawai;
    }

    public function store(Request $req){
        $res = Pegawai::create($req->all());
        return response()->json($res, 201);
    }

    public function update(Request $req, $id){
        $ids = explode(",", $id);
        $data = json_decode($req->getContent(), true);
        foreach($data as $row){
            Pegawai::where('id', $row['id'])->update(['nama' => $row['nama'],'jabatan' => $row['jabatan'],'alias' => $row['alias']]);
        }
        return response()->json($this->index(), 200);
    }

    public function delete($id){
        $ids = explode(",", $id);
        $items = Pegawai::destroy($ids);
        return response()->json($items, 204);
    }

    public function alias(){
        return Pegawai::pluck('alias')->toArray();
    }
}
