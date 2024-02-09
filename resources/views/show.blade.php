@extends('layouts.main')

@section('main')
<header class="masthead bg-primary text-white text-center" id="login">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">{{ $post->title }}</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
      
              <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
      
              
              <article class="my-3 fs-5">
                {!! $post->body !!}
              </article>
      
              <a href="/posts" class="d-block mt-3">Back to posts</a>
            </div>
          </div>
    </div>
</section>

@endsection