<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h3>Data Barang</h3>
 
	<a href="/barang"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/barang/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama" required="required"> <br/>
		Id kategori  <input type="text" name="id_kategori" required="required"> <br/>
		QTY <input type="text" name="qty" required="required"> <br/>
        harga beli<input type="text" name="harga_beli" required="required"> <br/>
        harga jual <input type="text" name="harga_jual" required="required"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>