@extends('layouts.print-layout')

@section('title','Laporan Agenda Rapat')

@section('content')
    <div class="row" style="margin-bottom: -115px">
        <div class="col-md-2">
            <img src="{{ asset('img/pemkot-white.png')}}" class="img-fluid mt-2" style="width: 75px;height: 105px">
        </div>
        <div class="col-md-8">
            <div class="text-center">
                <p class="font-weight-bold" style="font-size: 20px;margin-bottom: -5px">
                    PEMERINTAH KOTA SEMARANG
                </p>
                <p class="font-weight-bold" style="font-size: 22px">AGENDA RAPAT KECAMATAN PEDURUNGAN</p>
                <p style="font-size: 14px;margin-top: -13px;margin-bottom: -10px">
                    Jl. Majapahit No.357, Gemah, Kecamatan Pedurungan,
                    <br>
                    Kota Semarang, Jawa Tengah 50191
                </p>
                <hr style="border: 1px solid black">
                <hr style="border: black;margin-top: -14px">
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
    <div class="row" style="font-size: 12px">
        <div class="col-6">
            <table>
                <tbody>
                    <tr>
                        <td>DARI</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper(\Carbon\Carbon::parse($dari)->isoFormat('D MMMM Y'))}}</td>
                    </tr>
                    <tr>
                        <td>SAMPAI</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper(\Carbon\Carbon::parse($sampai)->isoFormat('D MMMM Y'))}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="header text-center mt-3">
        <h5 class="font-weight-bold"><u>LAPORAN AGENDA RAPAT</u></h5>
    </div>
    <table class="table table-sm table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>NO</th>
                <th>PENYELENGGARA</th>
                <th>TANGGAL/JAM</th>
                <th>KEPERLUAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rapats as $rapat)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $rapat->penyelenggara->nama_penyelenggara}}</td>
                    <td>{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->isoFormat('D MMMM Y')}}<br>Pukul {{ \Carbon\Carbon::parse($rapat->jam_rapat)->format('H:i')}} WIB</td>
                    <td>{{ $rapat->keperluan}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
