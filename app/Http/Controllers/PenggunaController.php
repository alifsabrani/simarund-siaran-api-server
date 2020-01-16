<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;

class PenggunaController extends Controller
{
    public function index(){
        return Pengguna::all();
    }

    public function show(Pengguna $pengguna){
        return $pengguna;
    }

    public function store(Request $req){
        $user = $req->all();
        $user['password'] = md5($user['password']);
        $res = Pengguna::create($user);
        return response()->json($res, 201);
    }

    public function update(Request $req, $id){
        $ids = explode(",", $id);
        $data = json_decode($req->getContent(), true);
        foreach($data as $row){
            if(Pengguna::where(['password'=> $row['password'], 'id' => $row['id']])->first()){
                Pengguna::where('id', $row['id'])->update(['username' => $row['username'],'level' => $row['level']]);
            }
            else{
                Pengguna::where('id', $row['id'])->update(['username' => $row['username'],'password' => md5($row['password']),'level' => $row['level']]);
            }
        }
        return response()->json($this->index(), 200);
    }

    public function delete($id){
        $ids = explode(",", $id);
        $items = Pengguna::destroy($ids);
        return response()->json($items, 204);
    }
}
