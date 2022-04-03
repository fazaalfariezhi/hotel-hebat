@extends('app.layouts.main')

@section('content')
<div class="page-info">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Halaman Utama</a></li>
          <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
      </ol>
  </nav>
</div>
<div class="row">
  <div class="col">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Data Reservasi Pelanggan</h5>
              <table id="zero-conf" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Tanggal Cek In</th>
                          <th>Tanggal Cek Out</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($pemesanan as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_pemesan }}</td>
                        <td>{{ $p->tgl_cek_in }}</td>
                        <td>{{ $p->tgl_cek_out }}</td>
                        <td>
                          <form action="/status/{{ $p->id }}" method="post">
                            @csrf
                            @if ($p->status === 'booking')
                              <input type="hidden" name="status" value="Check In">
                              <button class="btn btn-primary">Booking</button>
                            @elseif($p->status === 'Check In')
                              <input type="hidden" name="status" value="Check Out">
                              <button class="btn btn-success">Check In</button>
                            @elseif($p->status === 'Check Out')
                              <input type="hidden" name="status" value="Tuntas">
                              <button class="btn btn-danger">Check Out</button>
                            @else
                            @endif
                            
                            </form>
                            @if ($p->status === 'Tuntas')
                                <span class="btn btn-info">Tuntas</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
    {{-- <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Reservasi Pelanggan</h5>

              <!-- Table with stripped rows -->
              <table class="table datatables">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Tanggal Cek In</th>
                    <th scope="col">Tanggal Cek Out</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pemesanan as $p)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $p->nama_pemesan }}</td>
                    <td>{{ $p->tgl_cek_in }}</td>
                    <td>{{ $p->tgl_cek_out }}</td>
                    <td>
                      <form action="/status/{{ $p->id }}" method="post">
                      @csrf
                      @if ($p->status === 'booking')
                        <input type="hidden" name="status" value="Check In">
                        <button class="btn btn-primary">Booking</button>
                      @elseif($p->status === 'Check In')
                        <input type="hidden" name="status" value="Check Out">
                        <button class="btn btn-success">Check In</button>
                      @elseif($p->status === 'Check Out')
                        <input type="hidden" name="status" value="Tuntas">
                        <button class="btn btn-danger">Check Out</button>
                      @else
                      @endif
                      
                      </form>
                      @if ($p->status === 'Tuntas')
                          <span class="btn btn-info">Tuntas</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section> --}}

@endsection