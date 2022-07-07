@extends('layouts.dashboard')

@section('content')

<h1>Welcome back {{ $user->name }}, this is your home!</h1>
@if ($userInfo)
    
  <p>Phone: {{ $userInfo->phone }}</p>
  <p>Address: {{ $userInfo->address }}</p>

@endif

@endsection
