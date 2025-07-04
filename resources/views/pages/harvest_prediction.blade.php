@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('title', 'Prediksi panen')

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
    <h1 class="welcome-title">Prediksi Panen</h1>

    <div class="dashboard-section">
        <h3 class="section-title">Admin Dashboard</h3>
        <p style="color: #145214;">Anda login sebagai administrator. Gunakan menu navigasi untuk mengelola sistem.</p>
        
        <!-- You can add more dashboard content here -->
        <div class="mt-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="glass-card" style="padding: 1rem; min-height: 120px;">
                        <h5 style="color: #145214;">Total Pengguna</h5>
                        <p style="font-size: 2rem; color: #0b3d0b; font-weight: 700;">{{ $totalUsers ?? '0' }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="glass-card" style="padding: 1rem; min-height: 120px;">
                        <h5 style="color: #145214;">Admin</h5>
                        <p style="font-size: 2rem; color: #0b3d0b; font-weight: 700;">{{ $adminCount ?? '0' }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="glass-card" style="padding: 1rem; min-height: 120px;">
                        <h5 style="color: #145214;">Member</h5>
                        <p style="font-size: 2rem; color: #0b3d0b; font-weight: 700;">{{ $memberCount ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include any additional JavaScript if needed -->
<script>
    // You can add dashboard-specific JavaScript here if needed
</script>
@endsection
