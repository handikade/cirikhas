<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration {
  public function up() {
    Schema::create('produk', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('brand_id')->unsigned()->nullable();
      $table->foreign('brand_id')
            ->references('id')->on('brand')
            ->onDelete('set null');
      $table->string('nama');
      $table->text('deskripsi');
      $table->string('bahan');
      $table->string('perawatan');
      $table->integer('diskon')->default(0);
      $table->integer('harga');
      $table->integer('harga_diskon');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('produk');
  }
}
