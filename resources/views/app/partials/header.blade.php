
<div class="page-header">
  <nav class="navbar navbar-expand">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      <ul class="navbar-nav">
          <li class="nav-item small-screens-sidebar-link">
              <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
          </li>
      </ul>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
          </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="assets/images/avatars/profile-image-1.png" alt="profile image">
                  <span>{{ auth()->user()->nama }}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/">Halaman Utama</a>
                  <div class="dropdown-divider"></div>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Log out</button>
                </form>
              </div>
            </li>
          </ul>
      </div>
  </nav>
</div>



{{-- <div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="assetsAuth/img/avatar/avatar-1.png" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="features-activities.html" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Halaman Utama
        </a>
        <div class="dropdown-divider"></div>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt mt-2"></i>Logout</button>
        </form>
      </div>
    </li>
  </ul>
</nav> --}}

{{-- <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="/beranda" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block">Hotel Hebat</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <!-- End Search Icon-->

      

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">Hello, {{ auth()->user()->nama }}</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          <li>
            <a class="dropdown-item d-flex align-items-center" href="/">
              <i class="bi bi-house"></i>
              <span>Halaman Utama</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center"><i class="bi bi-box-arrow-right"></i>Logout</button>
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header>
   --}}