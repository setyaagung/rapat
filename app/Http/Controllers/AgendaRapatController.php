<?php

namespace App\Http\Controllers;

use App\Model\Pegawai;
use App\Model\PesertaRapat;
use App\Model\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaRapatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pegawai = Pegawai::where('id_user', Auth::user()->id_user)->first();
        $pesertas = PesertaRapat::where('id_pegawai', $pegawai->id_pegawai)->get();
        return view('frontend.agenda-rapat.index', \compact('pesertas'));
    }

    public function detail($id)
    {
        $rapat = Rapat::findOrFail($id);
        $pesertas = PesertaRapat::where('id_rapat', $rapat->id_rapat)->get();
        return view('frontend.agenda-rapat.detail', \compact('rapat', 'pesertas'));
    }
}
