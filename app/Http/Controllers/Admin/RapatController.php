<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pegawai;
use App\Model\Penyelenggara;
use App\Model\PesertaRapat;
use App\Model\Rapat;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapats = Rapat::orderBy('tanggal_rapat', 'DESC')->get();
        return view('backend.rapat.index', \compact('rapats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawais = Pegawai::orderBy('nip', 'ASC')->get();
        $penyelenggaras = Penyelenggara::all();
        return view('backend.rapat.create', \compact('pegawais', 'penyelenggaras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_rapat' => 'required',
            'jam_rapat' => 'required',
            'id_penyelenggara' => 'required',
            'lokasi' => 'required',
            'keperluan' => 'required'
        ]);
        $pesertas = $request->input('id_pegawai');
        if ($pesertas == \null) {
            return redirect()->back()->with('gagal', 'Anda belum menginputkan data peserta rapat');
        } else {
            $data = $request->all();
            $rapat = Rapat::create($data);
            foreach ($pesertas as $peserta) {
                PesertaRapat::create([
                    'id_rapat' => $rapat->id_rapat,
                    'id_pegawai' => $peserta
                ]);
            }
        }

        return redirect()->route('rapat.index')->with('create', 'Data rapat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rapat = Rapat::findOrFail($id);
        $pesertas = PesertaRapat::where('id_rapat', $rapat->id_rapat)->get();
        return view('backend.rapat.show', \compact('rapat', 'pesertas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rapat = Rapat::findOrFail($id);
        $penyelenggaras = Penyelenggara::all();
        return view('backend.rapat.edit', \compact('rapat', 'penyelenggaras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rapat = Rapat::findOrFail($id);
        $request->validate([
            'tanggal_rapat' => 'required',
            'jam_rapat' => 'required',
            'id_penyelenggara' => 'required',
            'lokasi' => 'required',
            'keperluan' => 'required'
        ]);
        $data = $request->all();
        $rapat->update($data);
        return redirect()->route('rapat.index')->with('update', 'Data rapat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapat = Rapat::findOrFail($id);
        $rapat->delete();
        return redirect()->route('rapat.index')->with('delete', 'Data rapat berhasil dihapus');
    }
}
