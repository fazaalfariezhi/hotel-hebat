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
              <h5 class="card-title">Riwayat Pemesanan</h5>
              <table id="zero-conf" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Pemesanan</th>
                          <th>Nama Pemesan</th>
                          <th>Tanggal Cek In</th>
                          <th>Tanggal Cek Out</th>
                          <th>Tipe Kamar</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($pemesanan as $p)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $p->invoice_id }}</td>
                        <td>{{ $p->nama_pemesan }}</td>
                        <td>{{ $p->tgl_cek_in }}</td>
                        <td>{{ $p->tgl_cek_out }}</td>
                        <td>{{ $p->kamar->type_kamar }}</td>
                        <td>
                          <a href="/receipt/{{ $p->invoice_id }}" class="btn btn-info">Cetak Struk</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

@endsection