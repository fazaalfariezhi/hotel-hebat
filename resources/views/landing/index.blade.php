@extends('layouts.main')

@section('title', 'Home')
    
@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">   
@endsection
@section('intro')
<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">

        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('homepage/img/hotel1.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Bali, Indonesia
                                        <br> 80112
                                    </p>
                                    <h1 class="intro-title mb-4 ">
                                        <br> Hotel Hebat
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        @if (Auth::check() && Auth::user()->role == 'tamu')
                                        <a href="/pemesanan"><span class="price-a">Pesan sekarang</span></a>
                                        @else
                                        <a href="/login"><span class="price-a">Pesan sekarang</span></a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('homepage/img/hotel2.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Bali, Indonesia
                                        <br> 80112
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <br> Swimming Pool
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        @if (Auth::check() && Auth::user()->role == 'tamu')
                                        <a href="/pemesanan"><span class="price-a">Pesan sekarang</span></a>
                                        @else
                                        <a href="/login"><span class="price-a">Pesan sekarang</span></a>
                                        @endif                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('homepage/img/hotel3.jpg') }})">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Bali, Indonesia
                                        <br> 80112
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <br> Elegant Room
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        @if (Auth::check() && Auth::user()->role == 'tamu')
                                        <a href="/pemesanan"><span class="price-a">Pesan sekarang</span></a>
                                        @else
                                        <a href="/login"><span class="price-a">Pesan sekarang</span></a>
                                        @endif                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>
@endsection

@section('content')
       
<!-- ======= About Section ======= -->
<section class="section-about section-t8">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 position-relative">
                <div class="about-img-box">
                    <img src="homepage/img/slide-about-1.jpg" alt="" class="img-fluid">
                </div>
                <div class="sinse-box">
                    <h3 class="sinse-title">Hotel Hebat
                        <span></span>
                        <br> Since 2022
                    </h3>
                    <p>Rest Area & Booking</p>
                </div>
            </div>
            <div class="col-md-12 section-t8 position-relative">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <img src="homepage/img/hotel.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2  d-none d-lg-block position-relative">
                        <div class="title-vertical d-flex justify-content-start">
                            <span>Tentang Kami | Hotel Hebat</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 section-md-t3">
                        <div class="title-box-d">
                            <h3 class="title-d">Sekilas |
                                <span class="color-d">Hotel</span> Hebat.
                                <br>tentang
                            </h3>
                        </div>
                        <p class="color-text-a">
                            Lepaskan diri anda ke Hotel Hebat, dikelilingin oleh keindahan pegunungan yang indah. danau, dan sawah menghijau. Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid's Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga. Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bali, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- ======= Latest Properties Section ======= -->
        <section class="section-property section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Tipe Kamar</h2>
                            </div>
                            <div class="title-link">
                                <a href="/room">Semua Tipe Kamar
                  <span class="bi bi-chevron-right"></span>
                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="property-carousel" class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($kamar as $k)
                        <div class="carousel-item-b swiper-slide">
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
                </div>
                <div class="propery-carousel-pagination carousel-pagination"></div>

            </div>
        </section>
        <!-- End Latest Properties Section -->

        <!-- ======= Agents Section ======= -->
        <section class="section-agents section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">Fasilitas Hotel</h2>
                            </div>
                            <div class="title-link">
                                <a href="/fasilitas">Semua Fasilitas Hotel
                  <span class="bi bi-chevron-right"></span>
                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
            </div>
        </section>
        <!-- End Agents Section -->

@endsection


@section('script')
<script src="{{ asset('assets/js/pages/select2.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>    
@endsection 