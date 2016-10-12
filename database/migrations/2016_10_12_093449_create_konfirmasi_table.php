<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiTable extends Migration {
  public function up() {
    Schema::create('konfirmasi', function (Blueprint $table) {
      $table->increments('id');
      $table->enum('status', ['lunas', 'belum'])->default('belum');
      $table->integer('pembelian_id')->unsigned();
      $table->foreign('pembelian_id')
            ->references('id')->on('pembelian')
            ->onDelete('cascade');
      $table->integer('admin_id')->unsigned();
      $table->foreign('admin_id')
            ->references('id')->on('admin')
            ->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::table('konfirmasi', function(Blueprint $table) {
      $table->dropForeign(['pembelian_id', 'admin_id']);
    });

    Schema::drop('konfirmasi');
  }
}
