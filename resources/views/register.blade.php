@extends('layouts.main')

@section('main')
<header class="masthead bg-primary text-white text-center" id="register">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Halaman Register</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">    
        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</section>

@endsection