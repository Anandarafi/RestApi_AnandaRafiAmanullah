<?php

namespace App\Http\Controllers;

use App\point;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nis' => 'required',
            'nama_siswa' => 'required',
            'kelas'=> 'required'
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $siswa = Siswa::create([
            'nis' => $req->nis,
            'nama_siswa' => $req->nama_siswa,
            'kelas'=> $req->kelas
        ]);
        if($siswa){
            return Response()->json(['status'=>1,'message'=>'Data Siswa berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Siswa tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nis'=> 'required',
            'nama_siswa'=> 'required',
            'kelas'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $siswa=Siswa::where('id',$id)->update([
            'nis'=>$req->nis,
            'nama_siswa'=>$req->nama_siswa,
            'kelas'=>$req->kelas,
        ]);
        if($siswa){
            return Response()->json(['status'=>1,'message'=>'Data siswa berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data siswa tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $siswa=Siswa::where('id',$id)->delete();
        if($siswa){
            return Response()->json(['status'=>1,'message'=>'Data siswa berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data siswa tidak berhasil dihapus']);
        }
    }

    public function tampil()
    {
        $siswa=Siswa::count();
        $siswa1=Siswa::all();
        if($siswa){
            return Response()->json(['count'=>$siswa,'user'=>$siswa1,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }

}
