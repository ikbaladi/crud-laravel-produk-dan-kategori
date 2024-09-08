<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Kategori;

class Barang extends Model
{
    use hasFactory;
    protected $table = 'produk';
    protected $fillable = ['nama', 'id_kategori', 'qty', 'harga_beli', 'harga_jual'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
