@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class=" text-center">Selamat Datang di Sistem Informasi Pemberitahuan Agenda Rapat</h5>
                    <img src="{{ asset('img/pedurungan.png')}}" class="img-fluid mt-4" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
