@extends('app.layouts.main')

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
                <h5 class="card-title">Form Pemesanan</h5>
                <p>Isi form pemesanan dibawah ini untuk melakukan pemesanan.</p>
                <form class="needs-validation" novalidate="" action="/pemesanan" method="POST">
                  @csrf
                  <div class="form-row" id="form">
                    <div class="form-group col-6">
                      <label for="tgl_cek_in">Tanggal Cek In</label>
                        <input type="date" class="form-control @error('tgl_cek_in') is-invalid @enderror" name="tgl_cek_in" id="tgl_cek_in" required value="{{ old('tgl_cek_in') }}">
                        @error('tgl_cek_in')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                      <label for="tgl_cek_out">Tanggal Cek Out</label>
                      <input type="date" class="form-control @error('tgl_cek_out') is-invalid @enderror" name="tgl_cek_out" id="tgl_cek_out" required value="{{ old('tgl_cek_out') }}">
                      @error('tgl_cek_out')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group col-5">
                      <label for="kamar_id">Tipe Kamar</label>
                      <input type="hidden" id="id">
                      <select id="kamar_id" name="kamar_id" class="form-control @error('kamar_id') is-invalid @enderror" required >
                      <option selected value="" disabled>Pilih Tipe Kamar</option>
                      @foreach ($tipekamar as $tk)
                      <option value="{{ $tk->id }}" id="item">{{ $tk->type_kamar }}</option>
                      @endforeach
                    </select>
                    @error('kamar_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group col-5">
                      <label for="price">Harga Kamar</label>
                      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" required readonly value="0">
                      @error('price')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group col-2">
                      <label for="jmlh_kamar">Jumlah Kamar</label>
                      <input type="number" class="form-control @error('jmlh_kamar') is-invalid @enderror" name="jmlh_kamar" id="jmlh_kamar" required value="{{ old('jmlh_kamar') }}">
                      @error('jmlh_kamar')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group col-6 mb-3">
                      <label for="nama_pemesan">Nama Pemesan</label>
                        <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" name="nama_pemesan" id="nama_pemesan" required value="{{ old('nama_pemesan') }}">
                        @error('nama_pemesan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <input type="hidden" name="invoice_id" value="{{ $inv }}">
                      <div class="form-group col-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-3">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" required value="{{ old('no_telp') }}">
                      @error('no_telp')
                      <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-6 mb-3">
                        <label for="nama_tamu">Nama Tamu</label>
                        <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" name="nama_tamu" id="nama_tamu" required value="{{ old('nama_tamu') }}">
                        @error('nama_tamu')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                      <div class="mt-5 text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>

$(function () {
    
  hello = '';

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  $('#form').on('click','#item',function (e) { 
    e.preventDefault();
    let $id = $('#kamar_id').val();
    const url = 'http://127.0.0.1:8000/getid/' + $.trim($id);
    $.ajax({
      type: "GET",
      url: url,
      dataType: "JSON",
      success: function (response) { 
        asd = '';
          $.each(response, function (idx, val) { 
            if (idx === 'price') {
              $('#price').val(val);
            }
          });
      }
    });
  });

});



</script>
@endsection