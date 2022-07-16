@extends('layouts.dashboard')

@section('content')
  <h1>Elenco dei tags</h1>
  <div class="row row-cols-3">
    @foreach ($tags as $tag)
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $tag->name }}</h5>
            <a href="{{ route('admin.tags.show', ['slug' =>$tag->slug]) }}" class="btn btn-primary">View all Posts with selected Tags</a>
          </div>
        </div>
      </div>      
    @endforeach
  </div>
@endsection
