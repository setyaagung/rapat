<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pegawai;
use App\Model\Penyelenggara;
use App\Model\Rapat;

class DashboardController extends Controller
{
    public function index()
    {
        $rapat = Rapat::count();
        $pegawai = Pegawai::count();
        $penyelenggara = Penyelenggara::count();
        return view('backend.dashboard', \compact('rapat', 'pegawai', 'penyelenggara'));
    }
}
