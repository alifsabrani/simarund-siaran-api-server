<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Siaran;
use App\ItemSiaran;
use Carbon\Carbon;
use App\Kategori;
use App\Jadwal;
use App\Pegawai;
use PDF;

class SiaranController extends Controller
{
    public function show(Siaran $siaran, $item){
         return $siaran->join('item_siaran', 'item_siaran.id_siaran', '=', 'siaran.id')
            ->leftJoin('item', 'item.id', '=', 'item_siaran.id_item')
            ->leftJoin('berita', 'item_siaran.id_item', '=', 'berita.id')
            ->leftJoin('pegawai as kameramen', 'kameramen.id', '=', 'berita.id_kameramen')
            ->leftJoin('pegawai as reporter', 'reporter.id', '=', 'berita.id_reporter')
            ->leftJoin('kategori', 'berita.id_kategori', '=', 'kategori.id')
            ->where('item_siaran.urutan', $item)
            ->orderBy('item_siaran.urutan')
            ->select('item_siaran.urutan as urutan', 'item_siaran.id as id', 'item.id as id_item', 'item.judul as judul', 'berita.durasi as durasi', 'kameramen.id as id_kameramen', 'kameramen.alias as kameramen', 'reporter.id as id_reporter','reporter.alias as reporter', 'berita.tanggal', 'berita.lokasi', 'berita.jenis_liputan', 'kategori.nama as siaran')
            ->first();
    }

    public function show_utama($tanggal){
        $tanggal = str_replace('_', '-', $tanggal);
        if( !$siaran = Siaran::where([['siaran.tanggal', '=', $tanggal], ['siaran.id_kategori', '=', '1']])->first()){
            $newSiaran = ['tanggal' => $tanggal, 'id_kategori' => 1];
            $siaran = Siaran::create($newSiaran);
        }
            $petugas = $siaran->petugas_siaran()
            ->with('pegawai')
            ->get();        
            $items = Siaran::join('item_siaran', 'item_siaran.id_siaran', '=', 'siaran.id')
            ->leftJoin('item', 'item.id', '=', 'item_siaran.id_item')
            ->leftJoin('berita', 'item_siaran.id_item', '=', 'berita.id')
            ->leftJoin('pegawai as kameramen', 'kameramen.id', '=', 'berita.id_kameramen')
            ->leftJoin('pegawai as reporter', 'reporter.id', '=', 'berita.id_reporter')
            ->leftJoin('kategori', 'berita.id_kategori', '=', 'kategori.id')
            ->where([['siaran.tanggal', '=', $tanggal],
            ['siaran.id_kategori', '=', '1']])
            ->orderBy('item_siaran.urutan')
            ->select('item_siaran.urutan as urutan', 'item_siaran.id as id', 'item.id as id_item', 'item.judul as judul', 'berita.durasi as durasi', 'kameramen.id as id_kameramen', 'kameramen.alias as kameramen', 'reporter.id as id_reporter','reporter.alias as reporter', 'berita.tanggal', 'berita.lokasi', 'berita.jenis_liputan', 'kategori.nama as siaran')
            ->get();
            $res = ['id' => $siaran->id, 'tanggal' => $siaran->tanggal, 'kategori' => $siaran->kategori()->first(), 'item' => $items, 'petugas_siaran' => $petugas];
        return $res;
    }

    public function show_tambahan($tanggal){
        $tanggal = str_replace('_', '-', $tanggal);
        if( !$siaran = Siaran::where([['siaran.tanggal', '=', $tanggal], ['siaran.id_kategori', '!=', '1']])->first()){
            $day = date("w", strtotime($tanggal)) + 1;
            $id_kategori = Jadwal::where([['id_kategori', '!=', 1],
                ['hari', '=', $day]])->first()['id_kategori'];
            $newSiaran = ['tanggal' => $tanggal, 'id_kategori' => $id_kategori];
            $siaran = Siaran::create($newSiaran);
        }
            $petugas = $siaran->petugas_siaran()
            ->with('pegawai')
            ->get();
            if(Siaran::leftJoin('kategori', 'siaran.id_kategori', '=', 'kategori.id')->where([['siaran.tanggal', '=', $tanggal],
            ['siaran.id_kategori', '!=', '1']])->select('kategori.siaran_lokal as lokal')->first()['lokal'] == 0){
                $items = Siaran::join('item_siaran', 'item_siaran.id_siaran', '=', 'siaran.id')
                ->leftJoin('item', 'item.id', '=', 'item_siaran.id_item')
                ->leftJoin('berita', 'item_siaran.id_item', '=', 'berita.id')
                ->leftJoin('pegawai as kameramen', 'kameramen.id', '=', 'berita.id_kameramen')
                ->leftJoin('pegawai as reporter', 'reporter.id', '=', 'berita.id_reporter')
                ->leftJoin('kategori', 'berita.id_kategori', '=', 'kategori.id')
                ->where([['siaran.tanggal', '=', $tanggal],
                ['siaran.id_kategori', '!=', '1']])
                ->orderBy('item_siaran.urutan')
                ->select('item_siaran.urutan as urutan', 'item_siaran.id as id', 'item.id as id_item', 'item.judul as judul', 'berita.durasi as durasi', 'kameramen.id as id_kameramen', 'kameramen.alias as kameramen', 'reporter.id as id_reporter','reporter.alias as reporter', 'berita.tanggal', 'berita.lokasi', 'berita.jenis_liputan', 'kategori.nama as siaran')
                ->get();
            }
            else{
                $items = Siaran::join('item_siaran', 'item_siaran.id_siaran', '=', 'siaran.id')
                ->leftJoin('item', 'item.id', '=', 'item_siaran.id_item')
                ->leftJoin('berita_daerah as berita', 'item_siaran.id_item', '=', 'berita.id')
                ->leftJoin('pegawai as dubber', 'dubber.id', '=', 'berita.id_dubber')
                ->leftJoin('pegawai as penterjemah', 'penterjemah.id', '=', 'berita.id_penterjemah')
                ->leftJoin('kategori', 'berita.id_kategori', '=', 'kategori.id')
                ->where([['siaran.tanggal', '=', $tanggal],
                ['siaran.id_kategori', '!=', '1']])
                ->orderBy('item_siaran.urutan')
                ->select('item_siaran.urutan as urutan', 'item_siaran.id as id', 'item.id as id_item', 'item.judul as judul', 'berita.durasi as durasi', 'dubber.id as id_dubber', 'dubber.alias as dubber', 'penterjemah.id as id_penterjemah','penterjemah.alias as penterjemah', 'berita.tanggal', 'kategori.nama as siaran')
                ->get();
            }
            
            $res = ['id' => $siaran->id, 'tanggal' => $siaran->tanggal, 'kategori' => $siaran->kategori()->first(), 'item' => $items, 'petugas_siaran' => $petugas];
        return $res;
    }
    
    public function store(Request $req, $siaran = null){
        $data = $req->all();
        if(is_null($siaran)){
            $id_kategori = Kategori::where('nama', $data['kategori'])->first()->id; 
            $newSiaran = ['tanggal' => $data['tanggal'], 'id_kategori' => $id_kategori];
            $siaran = Siaran::where([['tanggal', '=', $data['tanggal']],
            ['id_kategori', '=', $id_kategori]])->first();
            
            if(!$siaran){
                $siaran = Siaran::create($newSiaran);
                $lastOrder = 1;      
            }
            else{
                $lastOrder = ItemSiaran::where('id_siaran', '=', $siaran->id)->max('urutan')+1;
                
            }
            $dataSiaran = $siaran->first();
            $j = 0;
            for($i = 0;$i < sizeof($data['item']);$i++){
                if(!$siaran->item_siaran()->where('id_item', $data['item'][$i])->first()){
                    ItemSiaran::create(['id_siaran' => $siaran->id, 'id_item' => $data['item'][$i], 'urutan' => ($lastOrder+$j)]);
                    $j++;
                }
            }
            $res = $siaran;
        }
        else{
            $siaranSekarang = Siaran::find($siaran);
            $lastOrder = $siaranSekarang->item_siaran()->max('urutan')+1;
            $item = $siaranSekarang->item_siaran()->create(['id_item' => $data['id'], 'urutan' => ($lastOrder)]);
            $res = $this->show($siaranSekarang, $lastOrder);
        }
        return response()->json($res, 201);
    }

    public function update(Request $req, Siaran $siaran, $id){
        $ids = explode(",", $id);
        $data = json_decode($req->getContent(), true);
        foreach($data as $row){
            ItemSiaran::where(['id_siaran'=> $siaran->id, 'id' => $row['id']])->update(['urutan' => $row['urutan']]);
        }
        $items = $siaran->item_siaran()->orderBy('urutan')->get();
        return response()->json($data, 200);
    }

    public function delete(Siaran $siaran, $id){
        $ids = explode(",", $id);
        $items = $siaran->item_siaran()->whereIn('id', $ids)->delete();
        $urutan = $siaran->item_siaran()->orderBy('urutan')->get();
        // $prevUrutan = 0;
        // for($i = 1;$i < sizeof($urutan);i++){

        // }
        $i = 1;
        foreach($urutan as $item){
            if($item->urutan != $i){
                $item->where(json_decode($item, true))->update(['urutan' => $i]);
            }
            $i++;
        }
        $res = $siaran->item_siaran()->get();
        return response()->json($res, 200);
    }

    public function download(Siaran $siaran){
        if($siaran->id_kategori == 1){
            $items = $this->show_utama($siaran['tanggal']);
        }
        else{
            $items = $this->show_tambahan($siaran['tanggal']);
        }
        $eic = Pegawai::where('jabatan', "EIC")->select("nama")->first();
        $cde = Pegawai::where('jabatan', "CDE")->select("nama")->first();
        $kepala = Pegawai::where('jabatan', "Kepala Seksi Berita")->select("nama")->first();
        $pegawai = array('eic' => $eic, 'cde' => $cde, 'kepala' => $kepala);
        $items['pegawai'] = $pegawai;
        // view()->share('items',$items);
        $pdf = PDF::loadView('siaranPdf', ['items' => $items]);
        return $pdf->download("Siaran_".$siaran['tanggal'].".pdf");
    }
}
