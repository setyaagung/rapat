@extends('layouts.app')

@section('title','Agenda Rapat Anda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Agenda Rapat Anda</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-sm" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>PENYELENGGARA</th>
                                    <th>TANGGAL/JAM</th>
                                    <th>KEPERLUAN</th>
                                    <th>DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $peserta->rapat->penyelenggara->nama_penyelenggara}}</td>
                                        <td>{{ \Carbon\Carbon::parse($peserta->rapat->tanggal_rapat)->isoFormat('D MMMM Y')}}<br>Pukul {{ \Carbon\Carbon::parse($peserta->rapat->jam_rapat)->format('H:i')}} WIB</td>
                                        <td>{{ $peserta->rapat->keperluan}}</td>
                                        <td><a href="{{ route('agenda-rapat.detail',$peserta->id_rapat)}}" class="btn btn-warning">Lihat</a></td>
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
