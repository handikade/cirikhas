<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatTable extends Migration {
  public function up() {
    Schema::create('alamat', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
      $table->string('provinsi');
      $table->string('kota');
      $table->string('kecamatan');
      $table->string('kodepos');
      $table->string('nama_penerima');
      $table->string('hp_penerima');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('alamat');
  }
}
