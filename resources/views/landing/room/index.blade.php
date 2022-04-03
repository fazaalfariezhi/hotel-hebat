@extends('layouts.main')

@section('title', 'Layanan Kamar')
    
@section('content')
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">Layanan Kamar Kita</h1>
                <span class="color-text-a"></span>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Kamar
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->
  
      <!-- =======  Blog Grid ======= -->
      <section class="news-grid grid">
        <div class="container">
          <div class="row">
            @foreach ($kamar as $k)
            <div class="col-md-4">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                    <img src="{{ asset('storage/' . $k->image) }}" alt="{{ $k->type_kamar }}" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="property-single.html">
                                <br/> {{ $k->type_kamar }}</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Rp. {{ formatrupiah($k->price) }}</span>
                            </div>
                        </div>
                        <div class="card-footer-a">
                            <ul class="card-info d-flex justify-content-around">
                                <li>
                                    <h4 class="card-info-title">Fasilitas</h4>
                                    <span>{{ $k->fasilitas }}</span>
                                </li>
                                
                            </ul>
                        </div>
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
                  {{ $kamar->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Blog Grid-->
@endsection