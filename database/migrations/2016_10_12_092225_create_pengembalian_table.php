<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembalianTable extends Migration {
  public function up() {
    Schema::create('pengembalian', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('pembelian_id')->unsigned();
      $table->foreign('pembelian_id')
            ->references('id')->on('pembelian')
            ->onDelete('cascade');
      $table->text('keterangan');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('pengembalian', function(Blueprint $table) {
      $table->dropForeign(['pembelian_id']);
    });

    Schema::drop('pengembalian');
  }
}
