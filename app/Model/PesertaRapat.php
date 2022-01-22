<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PesertaRapat extends Model
{
    protected $table = 'peserta_rapat';
    protected $primaryKey = 'id_peserta_rapat';
    protected $fillable = ['id_rapat', 'id_pegawai'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
}
