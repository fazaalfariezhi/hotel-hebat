@extends('app.layouts.main')

@section('content')
<div class="page-info">
  <nav aria-label="breadcrumb">
    <h1>Fasilitas Kamar</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Halaman Utama</a></li>
          <li class="breadcrumb-item active" aria-current="page">Kamar</li>
      </ol>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-10">
      
      <div class="card">
{{-- ----------------------------------------------------------------------SUCCESS---------------------------------------------------------------------------------- --}}
        @if (session()->has('success'))
        <div class="row mt-4 justify-content-center">
          <div class="alert alert-success d-flex align-items-center col-md-7 justify-content-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              <div>
                {{ session('success') }}
              </div>
          </div>
        </div>
        @endif
{{-- ----------------------------------------------------------------------EDIT---------------------------------------------------------------------------------- --}}
        @if (session()->has('edit'))
        <div class="row mt-4 justify-content-center">
          <div class="alert alert-success d-flex align-items-center col-md-7 justify-content-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              <div>
                {{ session('edit') }}
              </div>
          </div>
        </div>
        @endif
{{-- ----------------------------------------------------------------------DELETE---------------------------------------------------------------------------------- --}}
        @if (session()->has('delete'))
        <div class="row justify-content-center mt-4">
          <div class="alert alert-danger d-flex align-items-center col-md-7 justify-content-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Danger:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>
                {{ session('delete') }}
              </div>
          </div>
        </div>
        @endif
        <div class="card-body">
          <h5 class="card-title">Data Semua Fasilitas Kamar</h5>
          <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Fasilitas</a>

          <!-- Table with stripped rows -->
          <table id="zero-conf" class="display" style="width:100%">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($fasilitaskamar as $fk)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $fk->nama }}</td>
                <td>
                  <a href="/fasilitas-kamar/{{ $fk->slug }}/edit" class="btn btn-success"><i class="bi bi-pencil-fill"> Edit</i></a>
                  <a href="/fasilitas-kamar/{{ $fk->slug }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $fk->slug }}"><i class="bi bi-trash-fill"> Delete</i></a>
                </td>
              </tr>
              <div class="modal fade" id="{{ $fk->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Fasilitas Hotel</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/fasilitas-kamar/{{ $fk->slug }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <p class="mb-3">Apakah anda yakin?</p>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Fasilitas Kamar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/fasilitas-kamar" method="POST" enctype="multipart/form-data">
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
                      <label for="image" class="form-label">Gambar Fasilitas</label>
                      <img class="img-preview img-fluid mb-3 img-thumbnail col-sm-5 d-block" style="max-height: 400px;">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                      @error('image')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Table with stripped rows -->

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