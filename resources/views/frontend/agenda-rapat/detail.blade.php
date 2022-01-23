@extends('layouts.app')

@section('title','Agenda Rapat Anda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Detail Agenda Rapat Anda</h6>
                    <div class="float-right">
                        <a href="{{ route('agenda-rapat')}}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th>Penyelenggara</th>
                                <th>:</th>
                                <td>{{ $rapat->penyelenggara->nama_penyelenggara}}</td>
                                <th>Lokasi Rapat</th>
                                <th>:</th>
                                <td>{{ $rapat->lokasi}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Rapat</th>
                                <th>:</th>
                                <td>{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->isoFormat('D MMMM Y')}}</td>
                                <th>Jam Rapat</th>
                                <th>:</th>
                                <td>{{ \Carbon\Carbon::parse($rapat->jam_rapat)->format('H:i')}} WIB</td>
                            </tr>
                            <tr>
                                <th>Keperluan</th>
                                <th>:</th>
                                <td>{{ $rapat->keperluan}}</td>
                            </tr>
                        </table>
                        <h5 class="text-center font-weight-bold">Data Peserta</h5>
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIP</th>
                                    <th>NAMA PESERTA</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>NO TELP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $peserta->pegawai->nip}}</td>
                                        <td>{{ $peserta->pegawai->nama_pegawai}}</td>
                                        <td>{{ $peserta->pegawai->jenis_kelamin}}</td>
                                        <td>+62{{ $peserta->pegawai->no_telp}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
