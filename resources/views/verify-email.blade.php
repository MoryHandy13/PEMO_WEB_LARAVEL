@extends('layouts.main')

@section('main')
<header class="masthead bg-primary text-white text-center" id="login">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Verifikasi Email</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">
  <div class="card mt-5">
    <div class="card-body">
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
                {{ session('message') }}
        </div>
        @else
        <div class="alert alert-danger" role="alert">
            Tolong periksa email anda terlebih dahulu untuk link verifikasi, jika tidak mendapatkan email silahkan <a href="/email/verification-notification">klik link disini untuk meminta link.</a> 
        </div>
        @endif
    </div>
  </div>
</div>
</section>
@endsection