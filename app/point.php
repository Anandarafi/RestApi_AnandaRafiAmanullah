<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table="poin_siswa";
    protected $primarykey="id";
    protected $fillable =[
        'id',
        'id_siswa',
        'id_pelanggaran',
        'tanggal',
        'keterangan',
        'id_petugas',
    ];
}
