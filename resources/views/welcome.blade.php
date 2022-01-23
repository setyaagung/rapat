@extends('layouts.app')

@section('title','Selamat Datang')

@section('content')
    <div class="jumbotron jumbotron-fluid" style="min-height: 590px">
        <div class="container text-center text-white mt-5">
            <h1 class="display-3">Sistem Informasi Pemberitahuan Agenda Rapat</h1>
            <p class="lead">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y')}}</p>
            @guest
                <a href="{{ route('login')}}" class="btn btn-outline-primary px-5 py-2">Login</a>
            @endguest
        </div>
    </div>

@endsection
