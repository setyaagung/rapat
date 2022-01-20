<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    protected $table = 'penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    protected $fillable = ['nama_penyelenggara'];
}
