@extends('layout.main')

{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/kategori/store" method="POST">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label><strong>Nama Kategori</strong></label>
            <input type="text" name="kategori" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Add Modal --}}

@section('container')
<h1 class="text-center mt-3">Daftar Kategori</h1>
<p class="fs-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id omnis in culpa dignissimos reprehenderit iusto, laudantium maxime cupiditate aliquid nostrum error molestiae ducimus quas perferendis nam eligendi placeat recusandae quia!</p>

@if(count($errors) > 0)

<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if(\Session::has('success'))
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>
<div class="alert alert-success d-flex align-items-center alert-dismissible" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <strong>{{\Session::get('success')}}</strong>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>

<table class="table table-striped table-hover mt-3">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col" class="text-center">#</th>
      <th scope="col">Nama Kategori</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kategori as $Data)
    <tr>
      <th scope="row" class="text-center">{{ $loop -> iteration}}</th>
      <td>{{ $Data->nama_kategori }}</td>
      <td>
        <a href="" class="link-success"><i class="fa-sharp fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection