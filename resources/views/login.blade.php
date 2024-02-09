@extends('layouts.main')

@section('main')
<header class="masthead bg-primary text-white text-center" id="login">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Halaman Login</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">
        @if(session()->has('Error'))
        <div class="alert alert-danger" role="alert">
            {{ session('Error') }}
          </div>
        @endif    
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</section>

@endsection