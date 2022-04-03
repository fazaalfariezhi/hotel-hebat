<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
  <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span></span>
  <span></span>
  <span></span>
</button>
      <a class="navbar-brand text-brand" href="/">Hotel<span class="color-b">Hebat</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
          <ul class="navbar-nav ms-auto">

              <li class="nav-item">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link {{ Request::is('room') ? 'active' : '' }}" href="/room">Kamar</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link {{ Request::is('fasilitas') ? 'active' : '' }}" href="/fasilitas">Fasilitas</a>
              </li>
          </ul>
          @guest
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
              </li>
          </ul>
          @else
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Welcome, {{ auth()->user()->nama }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/beranda">Beranda</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">Log out</button>
                  </form>
                </div>
              </li>
          </ul>
          @endguest
      </div>
  </div>
</nav>