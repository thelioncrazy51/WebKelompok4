@php
    $user = Auth::user();
    $isAdmin = $user->role === 'admin';
@endphp

<div class="sidebar" style="
    width: 250px;
    height: calc(100vh - 56px);
    position: fixed;
    left: 0;
    top: 56px;
    background: linear-gradient(180deg, #0b3d0b, #145214);
    color: white;
    padding: 20px;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    z-index: 1000;
">
    <div class="sidebar-header" style="
        padding: 20px 0;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        margin-bottom: 20px;
    ">
        <h3 style="color: white; margin: 0;">{{ $isAdmin ? 'Admin Dashboard' : 'Member Dashboard' }}</h3>
    </div>
    
    <ul class="sidebar-menu" style="list-style: none; padding: 0;">
        <!-- Menu Umum -->
        <li style="margin-bottom: 10px;">
            <a href="{{ $isAdmin ? route('admin.dashboard') : route('dashboard') }}" style="
                display: block;
                padding: 10px 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
            " onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" 
            onmouseout="this.style.backgroundColor='transparent'">
                <i class="fas fa-home" style="margin-right: 10px;"></i> Dashboard
            </a>
        </li>
        
        <!-- Prediksi Panen -->
        <li style="margin-bottom: 10px;">
            <a href="{{ route('harvest.prediction') }}" style="
                display: block;
                padding: 10px 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
            " onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" 
            onmouseout="this.style.backgroundColor='transparent'">
                <i class="fas fa-chart-line" style="margin-right: 10px;"></i> Prediksi Panen
            </a>
        </li>
        
        <!-- Product -->
        <li style="margin-bottom: 10px;">
            <a href="{{ route('products') }}" style="
                display: block;
                padding: 10px 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
            " onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" 
            onmouseout="this.style.backgroundColor='transparent'">
                <i class="fas fa-shopping-bag" style="margin-right: 10px;"></i> Product
            </a>
        </li>
        
        <!-- Menu Khusus Admin -->
        @if($isAdmin)
        <li style="margin-bottom: 10px;">
            <a href="{{ route('admin.data') }}" style="
                display: block;
                padding: 10px 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
            " onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'" 
            onmouseout="this.style.backgroundColor='transparent'">
                <i class="fas fa-database" style="margin-right: 10px;"></i> Data
            </a>
        </li>
        @endif
        
        <!-- Logout -->
        <li style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="
                display: block;
                padding: 10px 15px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: all 0.3s;
                background: rgba(255,255,255,0.1);
            " onmouseover="this.style.backgroundColor='rgba(255,255,255,0.2)'" 
            onmouseout="this.style.backgroundColor='rgba(255,255,255,0.1)'">
                <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
