@extends('layouts.main')

@section('main')
<header class="masthead bg-primary text-white text-center" id="category">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Semua Kategori</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
              <div class="col-md-4">
                <a href="/posts?category={{ $category->slug }}">
                    <div class="card text-white">
                      <div class="portfolio-item mx-auto">
                          <img class="img-fluid" src="{{ $images[array_rand($images)] }}" alt="..." />
                      </div>
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          </div>
    </div>
</section>

@endsection