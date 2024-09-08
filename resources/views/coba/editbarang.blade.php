<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 

	<h3>Edit Barang</h3>
 
	<a href="/barang"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($idbarang as $p)
	<form action="/barang/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id }}"> <br/>
		Nama <input type="text" required="required" name="nama" value="{{ $p->nama }}"> <br/>
		Jabatan <input type="text" required="required" name="id_kategori" value="{{ $p->id_kategori }}"> <br/>
		QTY <input type="number" required="required" name="qty" value="{{ $p->qty }}"> <br/>
		Harga Beli<input type="number" required="required" name="harga_beli" value="{{ $p->harga_beli }}"> <br/>
        Harga Jual<input type="number" required="required" name="harga_jual" value="{{ $p->harga_jual }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>