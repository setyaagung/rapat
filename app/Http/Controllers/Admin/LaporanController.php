<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Rapat;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('backend.laporan.index');
    }

    public function filter(Request $request)
    {
        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required',
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $rapats = Rapat::whereBetween('tanggal_rapat', [$dari, $sampai])
            ->orderBy('tanggal_rapat', 'ASC')
            ->get();
        return view('backend.laporan.index', compact('dari', 'sampai', 'rapats'));
    }

    public function print($dari, $sampai)
    {
        $rapats = Rapat::whereBetween('tanggal_rapat', [$dari, $sampai])
            ->orderBy('tanggal_rapat', 'ASC')
            ->get();
        $pdf = PDF::loadView('backend.laporan.print', compact('rapats', 'dari', 'sampai'));
        return $pdf->stream();
    }
}
