<!DOCTYPE html>
<html>
<head>
	<title>kATEGORI</title>
</head>
<body>
 
	<h3>Data Barang</h3>
 
	<a href="/kategori"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/kategori/store" method="post">
		{{ csrf_field() }}

		kategori  <input type="text" name="kategori" required="required"> <br/>

		<input type="submit" value="Simpan Data">
	</form>
 
</body>
</html>