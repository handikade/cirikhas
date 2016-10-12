<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianProdukTable extends Migration {
  public function up() {
    Schema::create('pembelian_produk', function (Blueprint $table) {
      $table->integer('pembelian_id')->unsigned()->index();
      $table->foreign('pembelian_id')
            ->references('id')->on('pembelian')
            ->onDelete('cascade');
      $table->integer('produk_id')->unsigned()->index();
      $table->foreign('produk_id')
            ->references('id')->on('produk')
            ->onDelete('cascade');
      $table->primary(['pembelian_id', 'produk_id']);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('pembelian_produk', function(Blueprint $table) {
      $table->dropForeign(['pembelian_id', 'produk_id']);
    });

    Schema::drop('pembelian_produk');
  }
}
