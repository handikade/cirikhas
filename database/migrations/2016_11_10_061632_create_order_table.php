<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {
  public function up() {
    Schema::create('order', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
      $table->integer('konfirmasi_id')->unsigned()->nullable();
      $table->foreign('konfirmasi_id')
            ->references('id')->on('konfirmasi')
            ->onDelete('set null');
      $table->integer('bank_id')->unsigned()->nullable();
      $table->foreign('bank_id')
            ->references('id')->on('bank')
            ->onDelete('set null');
      $table->integer('gift_id')->unsigned()->nullable();
      $table->foreign('gift_id')
            ->references('id')->on('gift')
            ->onDelete('set null');
      $table->integer('paket_id')->unsigned()->nullable();
      $table->foreign('paket_id')
            ->references('id')->on('paket')
            ->onDelete('set null');
      $table->integer('biaya_belanja');
      $table->integer('biaya_transfer');
      $table->string('alamat');
      $table->string('hp_penerima');
      $table->string('nama_penerima');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('order');
  }
}
