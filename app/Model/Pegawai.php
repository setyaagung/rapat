<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'id_user',
        'nip',
        'nama_pegawai',
        'jenis_kelamin',
        'no_telp',
        'alamat',
    ];
}
