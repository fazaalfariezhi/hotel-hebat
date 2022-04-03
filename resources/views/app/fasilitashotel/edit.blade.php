@extends('app.layouts.main')

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
            <form action="/fasilitas-hotel/{{ $fasilitashotel->slug }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Fasilitas</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama', $fasilitashotel->nama) }}">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug', $fasilitashotel->slug) }}">
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Fasilitas</label>
            <input type="hidden" name="oldImage" value="{{ $fasilitashotel->image }}">
            @if ($fasilitashotel->image)
              <img src="{{ asset('storage/' . $fasilitashotel->image) }}" class="img-preview img-fluid mb-3 img-thumbnail col-sm-5 d-block" style="max-height: 400px;">
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
        <div class="form-group">
            <label for="keterangan" class="form-label mb-3">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="75" rows="5" class="d-block form-control @error('keterangan') is-invalid @enderror mb-3" spellcheck="false">{{ $fasilitashotel->keterangan }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
      </form>
        </div>
      </div>

    </div>
  </div>
</section>

      


<script>
// const type_kamar = document.querySelector('#type_kamar');
// const slug = document.querySelector('#slug');

// type_kamar.addEventListener('change', function(){
//   fetch('/kamar/checkSlug?type_kamar=' + type_kamar.value)
//     .then(response => response.json())
//     .then(data => slug.value = data.slug)
// });

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