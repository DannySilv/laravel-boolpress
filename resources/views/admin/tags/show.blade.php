@extends('layouts.dashboard')

@section('content')
  <h1>{{ $tag->name }}</h1>
  <h5 class="text-muted">Slug: {{ $tag->slug }}</h5>
  <div class="row row-cols-3">
    @forelse ($tag->posts as $post)
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <a href="{{ route('admin.posts.show', ['post' =>$post->id]) }}" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    @empty
    <div class="col">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">No Post Available</h5>
        </div>
      </div>
    </div>
    @endforelse
  </div>
@endsection