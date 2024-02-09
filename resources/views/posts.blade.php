@extends('layouts.main')

@section('main')
<section class="page-section portfolio" id="post">
    <h1 class="my-3 text-center">{{ $title }}</h1>

  <div class="d-flex justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>


  @if ($posts->count())
  <div class="card mb-3">
      <div class="portfolio-item mx-auto">
          <img class="img-fluid" src="{{ $images[array_rand($images)] }}" alt="..." />
      </div>
      <div class="card-body text-center">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
        <p>
          <small class="text-muted">
            By. <a href="/posts?author={{ $posts[0]->author->name }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>

        <p class="card-text">{{ $posts[0]->excerpt }}</p>

        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

      </div>
    </div>
  
  
  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="portfolio-item mx-auto">
                <img class="img-fluid" src="{{ $images[array_rand($images)] }}" alt="..." />
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p>
                <small class="text-muted">
                  By. <a href="/post?author={{ $post->author->name }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                </small>
              </p>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @else
    <p class="text-center fs-4">No post found.</p>
  @endif

  {{-- <div class="d-flex">
    {{ $posts->links() }}
  </div> --}}
</section>

@endsection