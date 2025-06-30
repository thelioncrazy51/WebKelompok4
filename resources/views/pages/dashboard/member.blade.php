@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('container')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.89);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px 0 rgba(0, 0, 0, 0.35);
    }
    .text-highlight {
        color: #145214;
        font-weight: 700;
    }
    p, a {
        color: #145214;
    }
    .welcome {
        width: calc(50% - 20px);
        display: flex;
        height: 200px;
        padding: 10px;
        text-align: left;
    }
</style>

    <div class="welcome glass-card">
        <h1 class="text-highlight">Welcome</h1>
        @auth
        <p>Email: {{ Auth::user()->email }}</p>
        <a href="{{ route('logout') }}">Logout</a>
        @endauth
    </div>

@endsection
