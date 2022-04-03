@extends('app.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Fasilitas</h1>
  </div>
  <div class="col-md-7">
      
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