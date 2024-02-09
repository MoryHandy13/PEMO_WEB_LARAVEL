@extends('layouts.main')

@section('main')

<header class="masthead bg-primary text-white text-center" id="login">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="text-center mt-4">Buat Post</h1>
    </div>
</header>
<section class="page-section portfolio">
    <div class="container">    
        <form method="POST" action="/dashboard/posts">
            @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" readonly>
                @error('slug')
                  <p class="invalid-feedback">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select" id="category">
                  @foreach ($categories as $category)
                    @if (old("category_id") == $category->id)
                      <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else 
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
               <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="body" id="body" rows="10" cols="80">
                  {{ @old("body") }}
              </textarea>
               </div>
              
        
              <button type="submit" class="btn btn-primary">Create</button>
          </form>
    </div>
</section>

<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>

  const title = document.querySelector("#title");
  const slug = document.querySelector("#slug");

  title.addEventListener("change", function () {
    fetch("/dashboard/posts/checkslug?title="+title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })
  CKEDITOR.replace( 'body', {
    height: 300,    
  } );


  
</script>
@endsection