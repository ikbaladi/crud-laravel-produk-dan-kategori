<!DOCTYPE html>
<html>
<head>
	<title>KATEGORI</title>
</head>
<body>
 

	<h3>Edit Kategori</h3>
 
	<a href="/kategori"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($id as $p)
	<form action="/kategori/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->id_kategori }}"> <br/>
		Nama <input type="text" required="required" name="kategorii" value="{{ $p->kategori }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>