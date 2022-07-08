@extends('layouts.dashboard')

@section('content')

<h1>Categories List</h1>
<ul>
  @foreach ($categories as $category)
  <li>
    <a href="{{ route('admin.categories.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
  </li>
  @endforeach
</ul>
    
@endsection