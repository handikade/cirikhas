<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelianTable extends Migration {
  public function up() {
    Schema::create('pembelian', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
      $table->integer('alamat_id')->unsigned()->nullable();
      $table->foreign('alamat_id')
            ->references('id')->on('alamat')
            ->onDelete('set null');
      $table->integer('paket_id')->unsigned();
      $table->foreign('paket_id')
            ->references('id')->on('paket')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('pembelian', function(Blueprint $table) {
      $table->dropForeign(['user_id', 'alamat_id', 'paket_id']);
    });

    Schema::drop('pembelian');
  }
}
