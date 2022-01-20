@extends('layouts.back-main')

@section('title', 'Edit Penyelenggara')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Penyelenggara</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penyelenggara.update',$penyelenggara->id_penyelenggara)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Nama Penyelenggara</label>
                                <input id="nama_penyelenggara" type="text" class="form-control @error('nama_penyelenggara') is-invalid @enderror" name="nama_penyelenggara" value="{{ $penyelenggara->nama_penyelenggara }}" required autocomplete="nama_penyelenggara" autofocus>
                                @error('nama_penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="float-right">
                                <a href="{{ route('penyelenggara.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
