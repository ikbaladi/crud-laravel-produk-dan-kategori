<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();        
            $table->string('nama');
            $table->bigInteger('id_kategori')->unsigned();
            $table->integer('qty');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->foreign('id_kategori')->references('id')->on('kategori')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
