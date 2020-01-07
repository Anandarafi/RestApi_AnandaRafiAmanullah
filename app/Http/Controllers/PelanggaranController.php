<?php

namespace App\Http\Controllers;

use App\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelanggaranController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_pelanggaran' => 'required',
            'kategori' => 'required',
            'poin'=> 'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $pelanggaran = pelanggaran::create([
            'nama_pelanggaran' => $req->nama_pelanggaran,
            'kategori' => $req->kategori,
            'poin'=> $req->poin
        ]);
        if($pelanggaran){
            return Response()->json(['status'=>1,'message'=>'Data Pelanggaran berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Pelanggaran tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_pelanggaran'=> 'required',
            'kategori'=> 'required',
            'poin'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $pelanggaran=Pelanggaran::where('id',$id)->update([
            'nama_pelanggaran'=>$req->nama_pelanggaran,
            'kategori'=>$req->kategori,
            'poin'=>$req->poin,
        ]);
        if($pelanggaran){
            return Response()->json(['status'=>1,'message'=>'Data Pelanggaran berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Pelanggaran tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $pelanggaran=Pelanggaran::where('id',$id)->delete();
        if($pelanggaran){
            return Response()->json(['status'=>1,'message'=>'Data Pelanggaran berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Pelanggaran tidak berhasil dihapus']);
        }
    }

    public function tampil()
    {
        $pelanggaran=Pelanggaran::count();
        $pelanggaran1=Pelanggaran::all();
        if($pelanggaran){
            return Response()->json(['count'=>$pelanggaran,'user'=>$pelanggaran1,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
