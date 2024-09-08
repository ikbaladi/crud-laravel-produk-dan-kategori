<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Barang;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function barang(){
        return $this->hasMany('App\Models\Barang');
    }
    
}
