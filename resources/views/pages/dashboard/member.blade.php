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
        transition: all 0.3s ease;
        padding: 2rem;
        max-width: 600px;
        margin: 2rem auto;
    }
    
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px 0 rgba(0, 0, 0, 0.35);
    }
    
    .welcome-content {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .welcome-title {
        color: #145214;
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .user-info {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .user-email {
        color: #145214;
        font-size: 1.1rem;
    }
    
    .logout-btn {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background-color: #145214;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
        align-self: flex-start;
        margin-top: 1rem;
    }
    
    .logout-btn:hover {
        background-color: #0e3a0e;
        color: white;
    }
</style>

<div class="glass-card">
    <div class="welcome-content">
        <h1 class="welcome-title">Welcome Back!</h1>
        
        @auth
        <div class="user-info">
            <p class="user-email">Logged in as: <strong>{{ Auth::user()->email }}</strong></p>
            <a href="{{ route('logout') }}" class="logout-btn" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @endauth
    </div>
</div>

@endsection
