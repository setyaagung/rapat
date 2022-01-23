@extends('layouts.back-main')

@section('title', 'Tambah Rapat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Rapat</h6>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{$message}}.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('rapat.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Penyelenggara</label>
                                <select name="id_penyelenggara" class="form-control @error('tanggal_rapat') is-invalid @enderror penyelenggara" style="width: 100%" autofocus>
                                    <option value=""><option>
                                    @foreach ($penyelenggaras as $penyelenggara)
                                        <option value="{{ $penyelenggara->id_penyelenggara}}" {{ old('id_penyelenggara') == $penyelenggara->id_penyelenggara ? 'selected':''}}>{{ $penyelenggara->nama_penyelenggara}}</option>
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
                                <input id="tanggal_rapat" type="date" class="form-control @error('tanggal_rapat') is-invalid @enderror" name="tanggal_rapat" required autocomplete="tanggal_rapat">
                                @error('tanggal_rapat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jam Rapat</label>
                                <input id="jam_rapat" type="time" class="form-control @error('jam_rapat') is-invalid @enderror" name="jam_rapat" required autocomplete="jam_rapat">
                                @error('jam_rapat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi')}}" required autocomplete="jam_rapat">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Keperluan</label>
                                <textarea name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" rows="4">{{ old('keperluan')}}</textarea>
                                @error('keperluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="select-all" id="select-all" />
                                        </th>
                                        <th>NIP</th>
                                        <th>NAMA PESERTA</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>NO TELP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pegawais as $pegawai)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id_pegawai[]" value="{{ $pegawai->id_pegawai}}">
                                            </td>
                                            <td>{{ $pegawai->nip}}</td>
                                            <td>{{ $pegawai->nama_pegawai}}</td>
                                            <td>{{ $pegawai->jenis_kelamin}}</td>
                                            <td>+62{{ $pegawai->no_telp}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-right">
                                <a href="{{ route('rapat.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
