@extends('layouts.main')

@section('title', 'Fasilitas')
    
@section('content')
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">Fasilitas Luar Biasa Kami</h1>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Fasilitas
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->
  
      <!-- ======= Agents Grid ======= -->
      <section class="agents-grid grid">
        <div class="container">
          <div class="row">
            @foreach ($fasilitashotel as $fh)
                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{ asset('storage/' . $fh->image) }}" alt="{{ $fh->nama }}" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <p class="link-two">{{ $fh->nama }}</p>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d text-white">
                                    {{ $fh->keterangan }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-sm-12">
              <nav class="pagination-a">
                <ul class="pagination justify-content-end">
                  {{ $fasilitashotel->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </section><!-- End Agents Grid-->
@endsection