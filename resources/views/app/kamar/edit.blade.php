@extends('app.layouts.main')

@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">   
@endsection

@section('content')


<div class="pagetitle">
  <h1>Kamar</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
      <li class="breadcrumb-item"><a href="/kamar">Kamar</a></li>
      <li class="breadcrumb-item active">Edit Kamar</li>
    </ol>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-10">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Kamar</h5>
                <form action="/kamar/{{ $kamar->slug }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="mb-3">
                    <label for="type_kamar" class="form-label">Tipe Kamar</label>
                    <input type="text" class="form-control" id="type_kamar" name="type_kamar" required value="{{ old('type_kamar', $kamar->type_kamar) }}">
                  </div>
                  <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug', $kamar->slug) }}">
                  </div>
                  <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas Kamar</label>
                    <select class="js-states form-control" tabindex="-1" style="display: none; width: 100%" multiple="multiple" name="fasilitas[]" id="fasilitas">
                      <option value="" disabled></option>
                      @foreach($fasilitas as $f)
                        @if(in_array($f->nama, $fk))
                        <option value="{{ $f->nama }}" selected="true">{{ $f->nama }}</option>
                        @else
                        <option value="{{ $f->nama }}">{{ $f->nama }}</option>
                        @endif 
                      @endforeach
                    </select>
                    @error('fasilitas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>  
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Foto Kamar</label>
                    <input type="hidden" name="oldImage" value="{{ $kamar->image }}">
                    @if ($kamar->image)
                      <img src="{{ asset('storage/' . $kamar->image) }}" class="img-preview img-fluid mb-3 img-thumbnail col-sm-5 d-block" style="max-height: 400px;">
                    @else
                      <img class="img-preview img-fluid mb-3 img-thumbnail col-sm-5" style="max-height: 400px;">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="jmlh_kamar" class="form-label">Jumlah Kamar</label>
                    <input type="text" class="form-control" id="jmlh_kamar" name="jmlh_kamar" required value="{{ old('jmlh_kamar', $kamar->jmlh_kamar) }}">
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Harga Kamar</label>
                    <input type="text" class="form-control" id="price" name="price" required value="{{ old('price', $kamar->price) }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
      </div>

    </div>
  </div>
</section>



<script>
  function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
@endsection

@section('script')
<script src="{{ asset('assets/js/pages/select2.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>    
@endsection