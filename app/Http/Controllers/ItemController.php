<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function delete($id){
        $ids = explode(",", $id);
        $items = Item::destroy($ids);
        return response()->json($items, 204);
    }

    public function index(){
        $res = Item::leftJoin('berita_daerah as bd', 'item.id', '=', 'bd.id' )
        ->leftJoin('berita as b', 'item.id', '=', 'b.id' )
        ->select('item.id as id', 'item.judul as judul', 'item.id_pengguna as id_pengguna')
        ->where([['bd.id', null], ['b.id', null]])
        ->get();

        return response()->json($res, 200);
    }

    public function show(Item $item)
    {
        return $item::leftJoin('berita_daerah as bd', 'item.id', '=', 'bd.id' )
        ->leftJoin('berita as b', 'item.id', '=', 'b.id' )
        ->select('item.id as id', 'item.judul as judul', 'item.id_pengguna as id_pengguna')
        ->where([['bd.id', null], ['b.id', null], ['item.id', $item['id']]])
        ->first();
    }

    public function store(Request $request){
        $item = $request->all();
        $res = Item::create($item);
        return response()->json($this->show($res), 201);
    }

    public function update(Request $request, $id)
    {
        $ids = explode(",", $id);
        $data = json_decode($request->getContent(), true);
        foreach($data as $row){
            Item::where('id', $row['id'])->update(['judul' => $row['judul']]);
        }
        return response()->json($this->index(), 200);
    }
}
