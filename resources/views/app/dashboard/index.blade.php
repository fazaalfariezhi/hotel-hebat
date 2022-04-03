@extends('app.layouts.main')

@section('title', 'Beranda')
    

@section('content')


<div class="page-info">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Halaman Utama</a></li>
          <li class="breadcrumb-item active" aria-current="page">Beranda</li>
      </ol>
  </nav>
</div>
<div class="main-wrapper">
  <div class="row">
    <div class="col-xl">
          <div class="card">
              <div class="card-body">
                <h1 class="text-center mb-5">SELAMAT DATANG DI HOTEL HEBAT</h1>
                @if (session()->has('success'))
                  <div class="row justify-content-center mt-5">
                      <div class="alert alert-success alert-dismissible d-flex align-items-center col-md-7 justify-content-center" role="alert">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>
                          <div>
                            {{ session('success') }}
                          </div>
                          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                  </div>
                @endif
              </div>
          </div>
      </div>
  </div>
</div>



{{-- <div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Blank Page</h1>
          <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
              <div class="breadcrumb-item">Alert</div>
            </div>
      </div>

      <div class="section-body">
        <div class="card">
          <div class="card-header">
            
          </div>
          <div class="card-body">
            @if (session()->has('success'))
                    <div class="row justify-content-center mt-4">
                      <div class="alert alert-success d-flex align-items-center col-md-10 justify-content-center alert-dismissible fade show" role="alert">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg>
                          <div>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      </div>
                    </div>
            @endif
            <h1 class="text-center mb-5">Selamat datang di Hotel Hebat</h1>
            <br><br>
          </div>
        </div>
      </div>
  </section>
</div> --}}


{{-- <div class="pagetitle border-bottom-1">
  <h1>Beranda</h1>
</div>
<br>
@if (session()->has('success'))
<div class="row justify-content-center mt-4">
    <div class="alert alert-success alert-dismissible d-flex align-items-center col-md-7 justify-content-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <div>
          {{ session('success') }}
        </div>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
</div>
@endif
<div class="content mt-5">
  <h1 class="text-center fs-1 fw-bold">Selamat Datang di Hotel Hebat</h1>
</div> --}}


{{-- @if (session()->has('success')) --}}
{{-- @endif --}}
{{-- <br>
<br>
<br>
<br>
<br><br><br><br><br><br><br> --}}
@endsection