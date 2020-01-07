<?php

namespace App\Http\Controllers;

use App\Pelanggaran;
use App\point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoinController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_siswa' => 'required',
            'id_pelanggaran' => 'required',
            'tanggal'=> 'required',
            'keterangan'=> 'required',
            'id_petugas'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $poin = Point::create([
            'id_siswa' => $req->id_siswa,
            'id_pelanggaran' => $req->id_pelanggaran,
            'tanggal'=> $req->tanggal,
            'keterangan'=> $req->keterangan,
            'id_petugas'=> $req->id_petugas,
        ]);
        if($poin){
            return Response()->json(['status'=>1,'message'=>'Data poin pelanggaran berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data poin pelanggaran tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_siswa'=> 'required',
            'id_pelanggaran'=> 'required',
            'tanggal'=> 'required',
            'keterangan'=> 'required',
            'id_petugas'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $poin=Point::where('id',$id)->update([
            'id_siswa'=>$req->id_siswa,
            'id_pelanggaran'=>$req->id_pelanggaran,
            'tanggal'=>$req->tanggal,
            'keterangan'=> $req->keterangan,
            'id_petugas'=> $req->id_petugas,
        ]);
        if($poin){
            return Response()->json(['status'=>1,'message'=>'Data poin pelanggaran berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data poin pelanggaran tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $poin=Point::where('id',$id)->delete();
        if($poin){
            return Response()->json(['status'=>1,'message'=>'Data poin pelanggaran berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data poin pelanggaran tidak berhasil dihapus']);
        }
    }

    public function tampil()
    {
        $poin=Point::count();
        $poin1=Point::join('siswa','siswa.id','poin_siswa.id_siswa')->join('pelanggaran','pelanggaran.id','poin_siswa.id_pelanggaran')->get();
        if($poin){
            return Response()->json(['count'=>$poin,'poin'=>$poin1,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }


}
