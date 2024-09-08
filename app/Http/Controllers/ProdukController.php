<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index(){
		return view('coba/home',[
			'title' => 'home'
		]);
	}

	public function SemuaBarang(){
		return view('coba/barang',[
			'title' => 'barang',
			'data' => barang::all()
		]);
	}

	public function SemuaKategori(){
		return view('coba/kategori',[
			'title' => 'kategori',
			'datak' => kategori::all()
		]);
	}

	public function TambahBarang(){
		return view('coba/tambahbarang');
	}
	public function BarangStore(Request $request)
	{


		$this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
            'hbeli' => 'required',
            'hjual' => 'required',
        ]);
	// insert data ke table produk
		DB::table('produk')->insert([
			'nama' => $request->nama,
			'id_kategori' => $request->id_kategori,
			'qty' => $request->qty,
			'harga_beli' => $request->harga_beli,
			'harga_jual' => $request->harga_jual
		]);
	// alihkan halaman ke halaman barang
		return redirect('/barang');
	}
	public function EditBarang($id)
	{
	// mengambil data pegawai berdasarkan id yang dipilih
		$idbarang = DB::table('produk')->where('id',$id)->get();
	// passing data pegawai yang didapat ke view edit.blade.php
		return view('coba/editbarang',['idbarang' => $idbarang]);
	}


// update data pegawai
	public function UpdateBarang(Request $request)
	{
	// update data pegawai
		DB::table('produk')->where('id',$request->id)->update([
			'nama' => $request->nama,
			'id_kategori' => $request->id_kategori,
			'qty' => $request->qty,
			'harga_beli' => $request->harga_beli,
			'harga_jual'=> $request->harga_jual
		]);
	// alihkan halaman ke halaman pegawai
		return redirect('/barang');
	}

// method untuk hapus data pegawai
	public function HapusBarang($idd)
	{
	// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('produk')->where('id',$idd)->delete();
		
	// alihkan halaman ke halaman pegawai
		return redirect('/barang');
	}

	public function TambahKategori(){
		return view('coba/tambahkategori');
	}
	public function KategoriStore(Request $request)
	{
	// insert data ke table produk
		DB::table('kategori')->insert([
			'kategori' => $request->kategori
		]);
	// alihkan halaman ke halaman barang
		return redirect('/kategori');
	}

	public function EditKategori($id)
	{
	// mengambil data pegawai berdasarkan id yang dipilih
		$idkat = DB::table('kategori')->where('id_kategori',$id)->get();
	// passing data pegawai yang didapat ke view edit.blade.php
		return view('coba/editkategori',['id' => $idkat]);
	}


//update data kategori
	public function UpdateKategori(Request $request)
	{
	// update data kategori
		DB::table('kategori')->where('id_kategori',$request->id)->update([
			'kategori' => $request->kategorii
		]);
	// alihkan halaman ke halaman kategori
		return redirect('/kategori');
	}

	public function HapusKategori($iddd)
	{
	// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('kategori')->where('id_kategori',$iddd)->delete();
		
	// alihkan halaman ke halaman kategori
		return redirect('/kategori');
	}
}
