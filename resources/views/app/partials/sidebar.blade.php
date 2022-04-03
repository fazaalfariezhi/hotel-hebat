

<div class="page-sidebar">
    <div class="logo-box"><a href="/beranda" class="logo-text">Hotel Hebat</a><a href="/beranda" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Dashboard
            </li>
            <li class="{{ Request::is('beranda') ? 'active-page' : '' }}">
                <a href="/beranda" class="active"><i class="material-icons-outlined">dashboard</i>Beranda</a>
            </li>
            @can('tamu') {{-- ------------------------------------------TAMU SIDEBAR------------------------------------------------------------------ --}}
            <li class="{{ Request::is('pemesanan') ? 'active-page' : '' }}">
                <a href="/pemesanan"><i class="material-icons-outlined">calendar_today</i>Pemesanan</a>
            </li>
            <li class="{{ Request::is('receipt') ? 'active-page' : '' }}">
                <a href="/receipt"><i class="material-icons">update</i>Riwayat Pemesanan</a>
            </li>
            @endcan
            @can('admin') {{-- ------------------------------------------ADMIN SIDEBAR------------------------------------------------------------------ --}}
            <li class="sidebar-title">
                Admin Features
            </li>
            <li class="{{ Request::is('kamar*') ? 'active-page' : '' }}">
                <a href="/kamar"><i class="material-icons">meeting_room</i>Kamar</a>
            </li>
            <li class="{{ Request::is('fasilitas-kamar*') ? 'active-page' : '' }}">
                <a href="/fasilitas-kamar"><i class="material-icons">single_bed</i>Fasilitas Kamar</a>
            </li>
            <li class="{{ Request::is('fasilitas-hotel*') ? 'active-page' : '' }}">
                <a href="/fasilitas-hotel"><i class="material-icons">king_bed</i>Fasilitas Hotel</a>
            </li>
            @endcan
            @can('resepsionis') {{-- ------------------------------------------RESEPSIONIS------------------------------------------------------------------ --}}
            <li class="sidebar-title">
                Resepsionis
            </li>
            <li class="{{ Request::is('reservation') ? 'active-page' : '' }}">
                <a href="/reservation"><i class="material-icons">book</i>Reservation</a>
            </li>
            @endcan
        </ul>
    </div>
</div>



{{-- <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header ">Dashboard</li>
            <li class="nav-item dropdown {{ Request::is('beranda') ? 'active' : '' }} {{ Request::is('pemesanan') ? 'active' : '' }} {{ Request::is('riwayat') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('beranda') ? 'active' : '' }}"><a class="nav-link" href="/beranda">Beranda</a></li>
                    @can('tamu')
                    <li class="{{ Request::is('pemesanan') ? 'active' : '' }}"><a class="nav-link " href="/pemesanan">Pemesanan</a></li>
                    <li class="{{ Request::is('riwayat') ? 'active' : '' }}"><a class="nav-link" href="/riwayat">Riwayat Pemesanan</a></li>
                    @endcan
                </ul>
            </li>
            <li class="menu-header">Admin Feature</li>
            <li class="{{ Request::is('kamar') ? 'active' : '' }}"><a class="nav-link" href="/kamar"><i class="far fa-square"></i> <span>Kamar</span></a></li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Fasilitas</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('fasilitas-kamar') ? 'active' : '' }}"><a class="nav-link" href="/fasilitas-kamar">Fasilitas Kamar</a></li>
                    <li class="{{ Request::is('fasilitas-hotel') ? 'active' : '' }}"><a class="nav-link" href="/fasilitas-hotel">Fasilitas Hotel</a></li>
                </ul>
            </li>
            <li class="menu-header">Resepsionis Feature</li>
            <li class="{{ Request::is('reservation') ? 'active' : '' }}"><a class="nav-link" href="/reservation"><i class="far fa-file-alt"></i> <span>Data Reservasi</span></a></li>
    </aside>
</div> --}}


{{-- <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('beranda') ? '' : 'collapsed' }}" href="/beranda">
            <i class="bi bi-house"></i>
            <span>Beranda</span>
        </a>
    </li>
    @can('tamu')
    <li class="nav-item">
        <a class="nav-link  {{ Request::is('pemesanan') ? '' : 'collapsed' }}" href="/pemesanan">
            <i class="bi bi-grid"></i>
            <span>Pemesanan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link  {{ Request::is('riwayat') ? '' : 'collapsed' }}" href="/riwayat">
            <i class="bi bi-clock-history"></i>
            <span>Riwayat Pemesanan</span>
        </a>
    </li>
    @endcan
    @can('resepsionis')
    <li class="nav-heading">Resepsionis Feature</li>

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('reservation') ? '' : 'collapsed' }}" href="/reservation">
            <i class="bi bi-person"></i>
            <span>Reservation</span>
        </a>
    </li>
    @endcan
      <!-- End Dashboard Nav -->
    @can('admin')
    <li class="nav-heading">Admin Feature</li>

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('kamar*') ? '' : 'collapsed' }}" href="/kamar">
            <i class="bi bi-person"></i>
            <span>Kamar</span>
        </a>
    </li>
    <!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('fasilitas-kamar*') ? '' : 'collapsed' }}" href="/fasilitas-kamar">
            <i class="bi bi-question-circle"></i>
            <span>Fasilitas Kamar</span>
        </a>
    </li>
    <!-- End F.A.Q Page Nav -->

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('fasilitas-hotel*') ? '' : 'collapsed' }}" href="/fasilitas-hotel">
            <i class="bi bi-envelope"></i>
            <span>Fasilitas Hotel</span>
        </a>
    </li>
    @endcan
      <!-- End Contact Page Nav -->


  </ul>

</aside> --}}