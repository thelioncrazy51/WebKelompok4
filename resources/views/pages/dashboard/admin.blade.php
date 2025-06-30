@extends('main.layout')

@section('title', 'Dashboard Admin')

@section('container')
<div class="glass-card">
    <h1>Selamat Datang, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <!-- Konten dashboard lainnya -->
</div>
@endsection
