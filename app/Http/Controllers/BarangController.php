<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
	public function index() {
		$barang = Barang::all();
		return view('home',[
			'title' => 'Home'
		], compact('barang'));
	}

	public function semuaBarang() {
		return view('barang',[
			'title' => 'Barang',
			'barang' => Barang::all(),
			'kategori' => Kategori::all()
		]);
	}

	public function barangStore(Request $request) {
		$this->validate($request,[
			'nama' => 'required',
			'kategori' => 'required',
			'jumlah' => 'required',
			'hbeli' => 'required',
			'hjual' => 'required',
		]);

		$barang = new Barang;
        $barang->nama = $request->input('nama');
        $barang->id_kategori = $request->input('kategori');
        $barang->qty = $request->input('jumlah');
        $barang->harga_beli = $request->input('hbeli');
		$barang->harga_jual = $request->input('hjual');
        $barang->save();

	// // insert data ke table produk
	// 	DB::table('produk')->insert([
	// 		'nama' => $request->nama,
	// 		'id_kategori' => $request->kategori,
	// 		'qty' => $request->jumlah,
	// 		'harga_beli' => $request->hbeli,
	// 		'harga_jual' => $request->hjual,
	// 	]);

		return redirect('barang')->with('success','Data berhasil ditambahkan');
	}

	public function editBarang($id) {
		$barang = Barang::find($id);
		return response()->json([
			'status' => 200,
			'barang' => $barang,
		]);

		// mengambil data pegawai berdasarkan id yang dipilih
		// $idbarang = DB::table('produk')->where('id',$id)->get();
		// passing data pegawai yang didapat ke view edit.blade.php
		// return view('editbarang',['idbarang' => $idbarang]);
	}

	public function updateBarang(Request $request) {
		$id_barang = $request->input('id_barang');
		$barang = Barang::find($id_barang);
        $barang->nama = $request->input('nama');
        $barang->id_kategori = $request->input('kategori');
        $barang->qty = $request->input('jumlah');
        $barang->harga_beli = $request->input('hbeli');
		$barang->harga_jual = $request->input('hjual');
        $barang->update();

		// DB::table('produk')->where('id',$request->id)->update([
		// 	'nama' => $request->nama,
		// 	'id_kategori' => $request->id_kategori,
		// 	'qty' => $request->qty,
		// 	'harga_beli' => $request->harga_beli,
		// 	'harga_jual'=> $request->harga_jual
		// ]);
		
		return redirect('barang')->with('success','Data berhasil diubah');
	}

	public function hapusBarang($id) {
		DB::table('produk')->where('id',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
		return redirect('/barang');
	}

	public function semuaKategori(){
		return view('kategori',[
			'title' => 'Kategori',
			'kategori' => Kategori::all()
		]);
	}

	public function tambahKategori() {
		return view('tambahkategori');
	}
	
	public function kategoriStore(Request $request) {
	// insert data ke table produk
		DB::table('kategori')->insert([
			'nama_kategori' => $request->kategori
		]);
	// alihkan halaman ke halaman barang
		return redirect('/kategori');
	}

	public function editKategori($id) {
	// mengambil data pegawai berdasarkan id yang dipilih
		$idkat = DB::table('kategori')->where('id_kategori',$id)->get();
	// passing data pegawai yang didapat ke view edit.blade.php
		return view('editkategori',['id' => $idkat]);
	}


//update data kategori
	public function updateKategori(Request $request) {
	// update data kategori
		DB::table('kategori')->where('id_kategori',$request->id)->update([
			'kategori' => $request->kategorii
		]);
	// alihkan halaman ke halaman kategori
		return redirect('/kategori');
	}

	public function hapusKategori($iddd) {
	// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('kategori')->where('id_kategori',$iddd)->delete();
		
	// alihkan halaman ke halaman kategori
		return redirect('/kategori');
	}	

}
