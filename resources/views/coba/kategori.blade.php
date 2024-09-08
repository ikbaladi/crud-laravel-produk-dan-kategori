@extends('layout.main')
{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/kategori/store" method="POST">
        {{csrf_field()}}
        <div class="modal-body">

          <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" placeholder="Masukkan Nama Barang">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Add Modal --}}
@section('container')


<h1 class="mt-3">Kategori Barang</h1>
        <p class="fs-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet et perferendis quasi reprehenderit fugiat quidem, quaerat dolore dolorum nam sunt. Est cupiditate officiis ad natus saepe molestiae nulla cum dignissimos.</p>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Tambah Kategori Baru
</button>
        <table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Barang</th>
      <th scope="col">Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <!-- <a href="/kategori/tambah"> + Tambah Kategori Baru</a> -->
    @foreach ($datak as $Data)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{ $Data -> id_kategori }}</td>
      <td>{{ $Data -> kategori }}</td>
      <td>
      <a href="/kategori/edit/{{ $Data->id_kategori }}" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="/kategori/hapus/{{ $Data->id_kategori }}" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
				

				<!-- <a href="/kategori/edit/{{ $Data->id_kategori }}">Edit</a>
				|
				<a href="/kategori/hapus/{{ $Data->id_kategori }}">Hapus</a> -->
			</td>
    </tr>

    @endforeach
  </tbody>
</table>
@endsection