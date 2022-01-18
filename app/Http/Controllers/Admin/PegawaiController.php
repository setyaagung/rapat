<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pegawai;
use App\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('backend.pegawai.index', \compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pegawai.create');
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
            'nip.unique' => 'Maaf, NIP ini sudah digunakan pegawai lain',
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawai',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $message);

        $user = User::create([
            'nama' => $request->input('nama_pegawai'),
            'email' => $request->input('email'),
            'id_role' => 2,
            'password' => bcrypt($request->input('password')),
        ]);

        Pegawai::create([
            'id_user' => $user->id_user,
            'nip' => $request->input('nip'),
            'nama_pegawai' => $user->nama,
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat')
        ]);
        return redirect()->route('pegawai.index')->with('create', 'Data pegawai berhasil ditambahkan');
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
        $pegawai = Pegawai::findOrFail($id);
        $user = User::where('id_user', $pegawai->id_user)->first();
        return view('backend.pegawai.edit', compact('pegawai', 'user'));
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
        $pegawai = Pegawai::findOrFail($id);
        $user = User::where('id_user', $pegawai->id_user)->first();
        $message = [
            'nip.unique' => 'Maaf, NIP ini sudah digunakan pegawai lain',
            'email.unique' => 'Maaf, Email ini sudah digunakan user lain'
        ];
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:pegawai,nip,' . $pegawai->id_pegawai . ',id_dosen',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
            'password' => 'required|string|min:8|confirmed',
        ], $message);
        $data = $request->all();
        $pegawai->update($data);
        $user->update([
            'nama' => $request->input('nama_pegawai'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('pegawai.index')->with('update', 'Data pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('delete', 'Data pegawai berhasil dihapus');
    }
}
