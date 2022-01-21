<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    protected $table = 'rapat';
    protected $primaryKey = 'id_rapat';
    protected $fillable = [
        'tanggal_rapat',
        'jam_rapat',
        'id_penyelenggara',
        'lokasi',
        'keperluan'
    ];

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'id_penyelenggara');
    }
}
