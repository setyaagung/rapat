@extends('layouts.back-main')

@section('title', 'Laporan Rapat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ route('laporan.filter')}}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Dari</label>
                                        <input type="date" class="form-control" name="dari" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Sampai</label>
                                        <input type="date" class="form-control" name="sampai" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 32px">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if (isset($rapats))
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Agenda Rapat</h6>
                            <div class="float-right">
                                <a href="{{ route('laporan.print', [$dari,$sampai])}}" class="btn btn-danger btn-sm" target="_blank"><i class="fas fa-file-pdf"></i> <b><i>Print</i></b></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped table-sm">
                                    <thead>
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
                                                <td>{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->isoFormat('D MMMM Y')}} - {{ \Carbon\Carbon::parse($rapat->jam_rapat)->format('H:i')}} WIB</td>
                                                <td>{{ $rapat->keperluan}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
