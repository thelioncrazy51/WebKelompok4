{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color:rgb(13, 159, 44);">
  <div class="container">
    <a class="navbar-brand fw-bold" style="color:rgb(21, 22, 21);" href="/">Smart Farming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-3 mb-lg-0 gap-3">
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'fw-bold text-white' : '' }}" href="/">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'About Us') ? 'fw-bold text-white' : '' }}" href="/about-us">ABOUT US</a>
        </li>
        
        @auth
          {{-- Tampilan setelah login --}}
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dashboard' || request()->routeIs('dashboard')) ? 'fw-bold text-white' : '' }}" 
               href="{{ Auth::user()->role === 'admin' ? '/admin/dashboard' : '/member/dashboard' }}">DASHBOARD
            </a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="nav-link btn btn-link" style="border:none; background:none; cursor:pointer;">
                LOGOUT
              </button>
            </form>
          </li>
        @else
          {{-- Tampilan sebelum login --}}
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Login') ? 'fw-bold text-white' : '' }}" href="/login">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Register') ? 'fw-bold text-white' : '' }}" href="/register">REGISTER</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
{{-- navbar akhir --}}
