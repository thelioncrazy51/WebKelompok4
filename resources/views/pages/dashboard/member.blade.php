@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('title', 'Dashboard Member')

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
        padding: 2rem;
        margin-bottom: 2rem;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px 0 rgba(0, 0, 0, 0.3);
    }
    .welcome-title {
        color: #145214;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        text-shadow: 1px 1px 3px rgba(5, 43, 5, 0.2);
        position: relative;
        padding-bottom: 10px;
    }
    .welcome-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: #145214;
        bottom: 0;
        left: 0;
        border-radius: 2px;
    }
    .user-info {
        background: rgba(255, 255, 255, 0.7);
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid #145214;
    }
    .info-label {
        font-weight: 600;
        color: #145214;
        margin-bottom: 0.5rem;
    }
    .info-value {
        font-size: 1.1rem;
        color: #0b3d0b;
        margin-bottom: 1rem;
    }
    .dashboard-section {
        margin-top: 2rem;
    }
    .section-title {
        color: #145214;
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        border-bottom: 2px solid #145214;
        padding-bottom: 0.5rem;
    }
</style>

<div class="glass-card">
    <h1 class="welcome-title">Selamat Datang, {{ $user->name }}</h1>
    
    <div class="user-info">
        <div class="row">
            <div class="col-md-6">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $user->email }}</div>
            </div>
            <div class="col-md-6">
                <div class="info-label">Role</div>
                <div class="info-value text-capitalize">{{ $user->role }}</div>
            </div>
        </div>
    </div>

    <div class="dashboard-section">
        
        <!-- You can add more dashboard content here -->
        
    </div>
</div>

<!-- Include any additional JavaScript if needed -->
<script>
    // You can add dashboard-specific JavaScript here if needed
</script>
@endsection
