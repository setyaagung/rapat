@extends('layouts.back-main')

@section('title', 'Edit Rapat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Rapat</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rapat.update',$rapat->id_rapat)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Penyelenggara</label>
                                <select name="id_penyelenggara" class="form-control @error('id_penyelenggara') is-invalid @enderror penyelenggara" style="width: 100%" autofocus>
                                    <option value=""><option>
                                    @foreach ($penyelenggaras as $penyelenggara)
                                        <option value="{{ $penyelenggara->id_penyelenggara}}" {{ $rapat->id_penyelenggara == $penyelenggara->id_penyelenggara ? 'selected':''}}>{{ $penyelenggara->nama_penyelenggara}}</option>
                                    @endforeach
                                </select>
                                @error('id_penyelenggara')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Rapat</label>
                                <input id="tanggal_rapat" type="date" class="form-control @error('tanggal_rapat') is-invalid @enderror" name="tanggal_rapat" value="{{ \Carbon\Carbon::parse($rapat->tanggal_rapat)->format('Y-m-d')}}" required autocomplete="tanggal_rapat">
                                @error('tanggal_rapat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jam Rapat</label>
                                <input id="jam_rapat" type="time" class="form-control @error('jam_rapat') is-invalid @enderror" name="jam_rapat" value="{{ \Carbon\Carbon::parse($rapat->jam_rapat)->format('H:i')}}" required autocomplete="jam_rapat">
                                @error('jam_rapat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ $rapat->lokasi}}" required autocomplete="lokasi">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Keperluan</label>
                                <textarea name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" rows="4">{{ $rapat->keperluan}}</textarea>
                                @error('keperluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="float-right">
                                <a href="{{ route('rapat.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.penyelenggara').select2({
            placeholder: "-- Pilih Penyelenggara --",
            allowClear: true,
            theme: 'bootstrap4'
        });
        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
