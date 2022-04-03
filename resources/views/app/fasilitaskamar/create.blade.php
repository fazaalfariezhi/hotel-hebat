@extends('app.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Fasilitas</h1>
  </div>
  <div class="col-md-7">
      <form action="/fasilitas-kamar" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Fasilitas</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control" id="slug" name="slug" required>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        <div class="mb-3">
          <label for="kamar_id" class="form-label">Untuk Kamar</label>
          <select class="form-select" name="kamar_id">
            <option disabled selected value="">Open this select menu</option>
            @foreach ($tipekamar as $tk)
            <option value="{{ $tk->id }}">{{ $tk->type_kamar }}</option>
            @endforeach
          </select>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gambar Fasilitas</label>
          <img class="img-preview img-fluid mb-3 img-thumbnail col-sm-5 d-block" style="max-height: 400px;">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>

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