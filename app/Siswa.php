<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table="siswa";
    protected $primarykey="id";
    protected $fillable =[
        'id',
        'nis',
        'nama_siswa',
        'kelas',
    ];
}
