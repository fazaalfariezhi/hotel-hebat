@extends('app.layouts.main')

@section('content')

<div class="pagetitle">
  <h1>Kamar</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item {{ Request::is('kamar') ? 'active' : '' }}">Kamar</li>
    </ol>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-10">
      
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Semua Kamar</h5>
          <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Kamar</a>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Jumlah Kamar</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kamar as $k)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $k->type_kamar }}</td>
                <td>{{ $k->jmlh_kamar }}</td>
                <td>
                  {{-- <a href="/room/{{ $k->slug }}" class="btn btn-success"><i class="bi bi-eye-fill"></i></a> --}}
                  <a href="/kamar/{{ $k->slug }}/edit" class="btn btn-success"><i class="bi bi-pencil-fill"> Edit</i></a>
                  <a href="/kamar/{{ $k->slug }}" class="btn btn-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteBtn"><i class="bi bi-trash-fill"> Delete</i></a>
                </td>
              </tr>
              <div class="modal fade" id="deleteBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Kamar</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/kamar/{{ $k->slug }}" method="POST" class="d-inline">
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
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/kamar" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="type_kamar" class="form-label">Tipe Kamar</label>
                      <input type="text" class="form-control" id="type_kamar" name="type_kamar" required value="{{ old('type_kamar') }}">
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
                    </div>
                    <div class="mb-3">
                      <label for="jmlh_kamar" class="form-label">Jumlah Kamar</label>
                      <input type="text" class="form-control" id="jmlh_kamar" name="jmlh_kamar" required value="{{ old('jmlh_kamar') }}">
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




{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Kamar</h1>
  </div>
  <div class="col-md-7">
      <form action="/kamar" method="POST">
        @csrf
        <div class="mb-3">
          <label for="type_kamar" class="form-label">Tipe Kamar</label>
          <input type="text" class="form-control" id="type_kamar" name="type_kamar" required value="{{ old('type_kamar') }}">
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
        </div>
        <div class="mb-3">
          <label for="jmlh_kamar" class="form-label">Jumlah Kamar</label>
          <input type="text" class="form-control" id="jmlh_kamar" name="jmlh_kamar" required value="{{ old('jmlh_kamar') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> --}}

{{-- <script>
const type_kamar = document.querySelector('#type_kamar');
const slug = document.querySelector('#slug');

type_kamar.addEventListener('change', function(){
  fetch('/kamar/checkSlug?type_kamar=' + type_kamar.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});
</script> --}}
@endsection