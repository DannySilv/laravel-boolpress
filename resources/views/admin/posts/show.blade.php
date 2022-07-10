@extends('layouts.dashboard')

@section('content')
    <h1> {{ $post->title }} </h1>
    <p>Slug: {{ $post->slug }}</p>
    <p>Category: {{ $category ? $category->name : 'No category' }}</p>
    <p>Tags: 
      @forelse ($post->tags as $tag)
        {{ $tag->name }},   
      @empty
        No tags
      @endforelse
    <p>{{ $post->content }}</p>

    <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>
    <form class="d-inline-block" action="{{ route('admin.posts.destroy', [ 'post' => $post->id ]) }}" method="POST" onClick="return confirm('Are you sure?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Cancella</button>
    </form>
@endsection