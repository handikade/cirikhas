<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration {
  public function up() {
    Schema::create('produk', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->text('deskripsi');
      $table->integer('harga');
      $table->integer('brand_id')->unsigned();
      $table->foreign('brand_id')
            ->references('id')->on('brand')
            ->onDelete('cascade');
      $table->enum('ukuran', ['S', 'M', 'L', 'XL']);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('produk', function(Blueprint $table) {
      $table->dropForeign(['brand_id']);
    });

    Schema::drop('produk');
  }
}
