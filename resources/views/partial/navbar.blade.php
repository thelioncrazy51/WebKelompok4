{{-- navbar --}}
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color:rgb(13, 159, 44);">
  <div class="container">
    <a class="navbar-brand fw-bold" style="color:rgb(21, 22, 21);" href="/">Smart Farming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'fw-bold text-success' : '' }}" href="/">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Products') ? 'fw-bold text-success' : '' }}" href="/product">PRODUCTS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'About Us') ? 'fw-bold text-success' : '' }}" href="/about-us">ABOUT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'Career') ? 'fw-bold text-success' : '' }}" href="/career">CAREER</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($title === 'News & Article') ? 'fw-bold text-success' : '' }}" href="/news-article">NEWS & ARTICLE</a>
        </li>
        
        @auth
          {{-- Tampilan setelah login --}}
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dashboard' || request()->routeIs('dashboard')) ? 'fw-bold text-success' : '' }}" 
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
            <a class="nav-link {{ ($title === 'Login') ? 'fw-bold text-success' : '' }}" href="/login">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Register') ? 'fw-bold text-success' : '' }}" href="/register">REGISTER</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
{{-- navbar akhir --}}
