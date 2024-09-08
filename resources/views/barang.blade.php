@extends('layout.main')

{{-- Insert Modal --}}
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModal">Tambahhh Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/barang/store" method="POST">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label><strong>Nama Barang</strong></label>
            <input type="text" name="nama" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Kategori</strong></label>
            <select name="kategori" class="form-control" id="id_kategori"  name="form-control select2">
              <option hidden>--Pilih Kategori--</option>
              @foreach ($kategori as $Data)
            <option value="{{$Data->id}}">{{$Data->nama_kategori}}</option>
            @endforeach
            </select>
            <!-- <input type="text" name="kategori" class="form-control"> -->
          </div>

          <div class="form-group mt-3">
            <label><strong>Jumlah</strong></label>
            <input type="text" name="jumlah" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Harga Beli</strong></label>
            <input type="text" name="hjual" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Harga Jual</strong></label>
            <input type="text" name="hbeli" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Insert Modal --}}

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Edit Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/barang/update" method="POST">
        {{csrf_field()}}
        @method('PUT')
        <div class="modal-body">
        <input type="hidden" name="id_barang" id="id_barang" class="form-control">
          <div class="form-group">
            <label><strong>Nama Barang</strong></label>
            <input type="text" name="nama" id="nama" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Kategori</strong></label>
            <select name="kategori" class="form-control" id="id_kategori"  name="form-control select2">
              <option hidden>--Pilih Kategori--</option>
              @foreach ($kategori as $Data)
            <option value="{{$Data->id}}">{{$Data->nama_kategori}}</option>
            @endforeach
            </select>
            <!-- <input type="text" name="kategori" id="kategori" class="form-control"> -->
          </div>

          <div class="form-group mt-3">
            <label><strong>Jumlah</strong></label>
            <input type="text" name="jumlah" id="jumlah" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Harga Beli</strong></label>
            <input type="text" name="hjual" id="hjual" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Harga Jual</strong></label>
            <input type="text" name="hbeli" id="hbeli" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- End Edit Modal --}}

@section('container')
<h1 class="text-center mt-3">Daftar Barang</h1>
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
  Tambah Data
</button>

<table class="table table-striped table-hover mt-3">
  <thead class="bg-primary text-white">
    <tr class="text-light">
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Kategori</th>
      <th scope="col">Qty</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($barang as $Data)
    <tr>
      <th scope="row">{{ $loop -> iteration}}</th>
      <td>{{ $Data->nama }}</td>
      <td>
      {{ $Data->kategori->nama_kategori}}
      </td>
      <td>{{ $Data->qty }}</td>
      <td>{{ $Data->harga_jual }}</td>
      <td>{{ $Data->harga_beli }}</td>
      <td>
        <button type="button" value="{{$Data->id}}" class="btn btn-primary editbtn btn-sm">Edit</button>
        <!-- <a href="barang/edit/{{ $Data->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-success"><i class="fa-sharp fa-solid fa-pen-to-square fs-5 me-3"></i></a> -->
        <a href="/barang/hapus/{{ $Data->id }}" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
  
</table>

@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click', '.editbtn', function () {
      var id_barang = $(this).val();
      $('#editModal').modal('show');

      $.ajax({
        type: "GET",
        url: "/barang/edit/" + id_barang,
        success: function (response){
          $('#nama').val(response.barang.nama);
          $('#kategori').val(response.barang.id_kategori);
          $('#jumlah').val(response.barang.qty);
          $('#hbeli').val(response.barang.harga_beli);
          $('#hjual').val(response.barang.harga_jual);
          $('#id_barang').val(id_barang);
        }
      });
    });
  });
</script>
@endsection