<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Penyelenggara;

class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyelenggaras = Penyelenggara::all();
        return view('backend.penyelenggara.index', \compact('penyelenggaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.penyelenggara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'nama_penyelenggara.unique' => 'Maaf, Nama Penyelenggara ini sudah ada dalam data',
        ];
        $request->validate([
            'nama_penyelenggara' =>  'required|string|max:255|unique:penyelenggara',
        ], $message);

        $data = $request->all();
        Penyelenggara::create($data);
        return redirect()->route('penyelenggara.index')->with('create', 'Data penyelenggara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        return view('backend.penyelenggara.edit', \compact('penyelenggara'));
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
        $penyelenggara = Penyelenggara::findOrFail($id);
        $message = [
            'nama_penyelenggara.unique' => 'Maaf, Nama Penyelenggara ini sudah ada dalam data',
        ];
        $request->validate([
            'nama_penyelenggara' =>  'required|string|max:255|unique:penyelenggara,nama_penyelenggara,' . $penyelenggara->id_penyelenggara . ',id_penyelenggara',
        ], $message);

        $data = $request->all();
        $penyelenggara->update($data);
        return redirect()->route('penyelenggara.index')->with('update', 'Data penyelenggara berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyelenggara = Penyelenggara::findOrFail($id);
        $penyelenggara->delete();
        return redirect()->route('penyelenggara.index')->with('delete', 'Data penyelenggara berhasil dihapus');
    }
}
