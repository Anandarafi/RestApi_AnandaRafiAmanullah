<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggaran;
use App\point;
use App\User;
use App\Siswa;

class DashboardController extends Controller
{
    public function tampil()
    {
        $siswa=Siswa::count();
        $user=User::count();
        $pelanggaran=Pelanggaran::count();
        $poin=Point::count();
        return Response()->json(['jml_siswa'=>$siswa,'jml_petugas'=>$user,'jml_pelanggaran'=>$pelanggaran,'pelanggaran_hari_ini'=>$poin,]);
    }
}
