@extends('layouts.main')

@section('main')

<header class="masthead bg-primary text-white text-center" id="login">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Halaman Post</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">    
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <a href="/dashboard/posts/create" class="btn btn-info w-100 mb-5">Tambah Post</a>
        <table class="table table-striped">
            @if($Posts->count())
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                              Delete
                            </button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            @else
            <h1>Tidak ada posts</h1>
            @endif
            </tbody>
          </table>
    </div>
</section>

@endsection