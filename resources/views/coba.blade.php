<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">

    <title>coba</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">TokoApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          as
        </li>
        <li class="nav-item">
          asa
        </li>
        <li class="nav-item">
          asas
        </li>
    </ul>
    </div>
  </div>
</nav>
{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('simpan-coba')}}" method="POST">
        {{csrf_field()}}
        <div class="modal-body">

          <div class="form-group">
            <label><strong>Nama Barang</strong></label>
            <input type="text" name="nama" class="form-control">
          </div>

          <div class="form-group mt-3">
            <label><strong>Kategori</strong></label>
            <select name="form-control select2" class="form-control" id="id_kategori" name="kategori">
              <option hidden>--Pilih Kategori--</option>
            @foreach ($dtKategori as $Data)
            <option value="{{$Data->id}}">{{$Data->nama_kategori}}</option>
            @endforeach
            </select>
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
{{-- End Add Modal --}}
    <!-- Konten -->
    <div class="container">
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
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
  @foreach ($dtBarang as $Data)
    <tr>
    <th scope="row">{{ $loop -> iteration}}</th>
      <td>{{ $Data->nama }}</td>
      <td>{{ $Data->kategori->nama_kategori}}</td>
      <td>{{ $Data->qty }}</td>
      <td>{{ $Data->harga_jual }}</td>
      <td>{{ $Data->harga_beli }}</td>
      <td>
        <a href="" class="link-success"><i class="fa-sharp fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        <a href="" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
      </td>
    </tr>    
    @endforeach
  </tbody>
  
</table>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>