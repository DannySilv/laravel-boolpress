@extends('layouts.dashboard')

@section('content')

<h1>Category: {{ $category->name }}</h1>
<p>Slug: {{ $category->slug }}</p>

<ul>
@forelse ($category->posts as $post)
    <li>
      <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a>
    </li>
@empty
    <li>No connected post</li>
@endforelse
</ul>
@endsection