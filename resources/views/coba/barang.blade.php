@extends('layout.main')


{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/barang/store" method="POST">
        {{csrf_field()}}
        <div class="modal-body">

          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang">
          </div>

          <div class="form-group mt-3">
            <label>Kategori</label>
            <input type="text" name="id_kategori" class="form-control" placeholder="Masukkan Kategori Barang">
          </div>

          <div class="form-group mt-3">
            <label>Jumlah</label>
            <input type="text" name="qty" class="form-control" placeholder="Masukkan Jumlah Barang">
          </div>

          <div class="form-group mt-3">
            <label>Harga Beli</label>
            <input type="text" name="harga_jual" class="form-control" placeholder="Masukkan Harga Beli Barang">
          </div>

          <div class="form-group mt-3">
            <label>Harga Jual</label>
            <input type="text" name="harga_beli" class="form-control" placeholder="Masukkan Harga Jual Barang">
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


<h1 class="mt-3">Daftar Barang</h1>
        <p class="fs-light">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet et perferendis quasi reprehenderit fugiat quidem, quaerat dolore dolorum nam sunt. Est cupiditate officiis ad natus saepe molestiae nulla cum dignissimos.</p>
        
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
  + Tambah Barang Baru
</button>




        
        <table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">QTY</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      
    

  
    @foreach ($data as $Data)
    <tr>
      <th scope="row">{{$loop -> iteration}}</th>
      <td>{{ $Data -> nama }}</td>
      <td>{{ $Data -> qty }}</td>
      <td>{{ $Data -> harga_jual}}</td>
      <td>{{ $Data -> harga_beli }}</td>
      <td>
        <a href="/barang/edit/{{ $Data->id }}" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="/barang/hapus/{{ $Data->id }}" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
				
        <!-- <a href="/barang/edit/{{ $Data->id }}">Edit</a>
				<a href="/barang/hapus/{{ $Data->id }}">Hapus</a> -->
			</td>
    </tr>

    @endforeach
  </tbody>
</table>





<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection