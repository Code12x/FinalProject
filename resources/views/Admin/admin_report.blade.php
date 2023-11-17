@extends('Shared/_layout')

@section('title', 'Report')

@section('content')

<h1>{{ $user->strFirstName }} {{ $user->strLastName }}</h1>
<p>Access level: {{ $user->role->strName }}</p>

@endsection