<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table="pelanggaran";
    protected $primarykey="id";
    protected $fillable =[
        'id',
        'nama_pelanggaran',
        'kategori',
        'poin',
    ];
}
