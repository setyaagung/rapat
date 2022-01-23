@extends('layouts.back-main')

@section('title', 'Data Rapat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Rapat</h6>
                        <div class="float-right">
                            <a href="{{ route('rapat.index')}}" class="btn btn-sm btn-secondary">Kembali</a>
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
                            <table id="dataTable" class="table table-bordered table-striped">
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
