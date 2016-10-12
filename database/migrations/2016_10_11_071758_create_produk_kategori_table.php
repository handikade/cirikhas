<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukKategoriTable extends Migration {
  public function up() {
    Schema::create('produk_kategori', function (Blueprint $table) {
      $table->integer('produk_id')->unsigned()->index();
      $table->foreign('produk_id')
            ->references('id')->on('produk')
            ->onDelete('cascade');
      $table->integer('kategori_id')->unsigned()->index();
      $table->foreign('kategori_id')
            ->references('id')->on('kategori')
            ->onDelete('cascade');
      $table->primary(['produk_id', 'kategori_id']);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('produk_kategori', function (Blueprint $table) {
      $table->dropForeign(['produk_id', 'kategori_id']);
    });

    Schema::drop('produk_kategori');
  }
}
