<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembalianTable extends Migration {
  public function up() {
    Schema::create('pengembalian', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('order_id')->unsigned();
      $table->foreign('order_id')
            ->references('id')->on('order')
            ->onDelete('cascade');
      $table->integer('admin_id')->unsigned()->nullable();
      $table->foreign('admin_id')
            ->references('id')->on('admin')
            ->onDelete('set null');
      $table->text('keterangan');
      $table->enum('status', ['sudah', 'belum'])->default('belum');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('pengembalian');
  }
}
